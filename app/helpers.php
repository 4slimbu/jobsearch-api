<?php

if(!function_exists('datetimeStringToUtc')) {
    /**
     * Take the provided datetime string and converts to the app timezone. This is intended for datetime strings which
     * include timezone data, eg. W3C format
     *
     * @param string $datetime
     *
     * @return string
     */
    function datetimeStringToUtc($datetime)
    {
        if (empty($datetime)) {
            return $datetime;
        }

        return Carbon\Carbon::parse($datetime)->timezone('UTC')->toDateTimeString();
    }
}

if(!function_exists('maskString')) {
    function maskString($string, $total = 1, $ignore = array())
    {
        $stringLength =  strlen($string);
        if($stringLength > $total) {
            $maskStringLength = $stringLength-$total;
            $maskString =  substr($string, 0, $total).str_repeat('&#8226;', $stringLength-$total);
            return $maskString;
        } else {
            return $string;
        }
        
    }
}

if(!function_exists('formattedExperience')) {
    function formattedExperience($num)
    {
        if($num > 0) {
            if($num > 12) {
                $months = myRemainder($num, 12);
                $years = floor($num/12);
                if($months > 0) {
                    $years = $years. ($years>1?' years ':' year '). $months. ($months>1?' months':' month'). ' exp.';
                } else {
                    $years = $years. ' years exp.';
                }
                return $years;
            } else if($num == 1) {
                return $num. ' month exp.';
            } else {
                return $num. ' months exp.';
            }
        } else {
            return NULL;
        }
    }
}

if(!function_exists('myRemainder')) {
    function myRemainder($n, $d) {
        $result = floor($n/$d);
        $remainder = $d * $result;
        $remainder = $n - $remainder;
        return $remainder;
    } 
}

if(!function_exists('arrayColumnRecursive')) {

    function arrayColumnRecursive( $input = NULL, $columnKey = NULL, $indexKey = NULL ) {

        // Using func_get_args() in order to check for proper number of
        // parameters and trigger errors exactly as the built-in array_column()
        // does in PHP 5.5.
        $argc   = func_num_args();
        $params = func_get_args();
        if ( $argc < 2 ) {
            trigger_error( "arrayColumnRecursive() expects at least 2 parameters, {$argc} given", E_USER_WARNING );
            return NULL;
        }
        if ( ! is_array( $params[ 0 ] ) ) {
            // Because we call back to this function, check if call was made by self to
            // prevent debug/error output for recursiveness :)
            $callers = debug_backtrace();
            if ( $callers[ 1 ][ 'function' ] != 'arrayColumnRecursive' ){
                trigger_error( 'arrayColumnRecursive() expects parameter 1 to be array, ' . gettype( $params[ 0 ] ) . ' given', E_USER_WARNING );
            }

            return NULL;
        }
        if ( ! is_int( $params[ 1 ] )
            && ! is_float( $params[ 1 ] )
            && ! is_string( $params[ 1 ] )
            && $params[ 1 ] !== NULL
            && ! ( is_object( $params[ 1 ] ) && method_exists( $params[ 1 ], '__toString' ) )
        ) {
            trigger_error( 'arrayColumnRecursive(): The column key should be either a string or an integer', E_USER_WARNING );

            return FALSE;
        }
        if ( isset( $params[ 2 ] )
            && ! is_int( $params[ 2 ] )
            && ! is_float( $params[ 2 ] )
            && ! is_string( $params[ 2 ] )
            && ! ( is_object( $params[ 2 ] ) && method_exists( $params[ 2 ], '__toString' ) )
        ) {
            trigger_error( 'arrayColumnRecursive(): The index key should be either a string or an integer', E_USER_WARNING );

            return FALSE;
        }
        $paramsInput     = $params[ 0 ];
        $paramsColumnKey = ( $params[ 1 ] !== NULL ) ? (string) $params[ 1 ] : NULL;
        $paramsIndexKey  = NULL;
        if ( isset( $params[ 2 ] ) ) {
            if ( is_float( $params[ 2 ] ) || is_int( $params[ 2 ] ) ) {
                $paramsIndexKey = (int) $params[ 2 ];
            } else {
                $paramsIndexKey = (string) $params[ 2 ];
            }
        }
        $resultArray = array();
        foreach ( $paramsInput as $row ) {
            $key    = $value = NULL;
            $keySet = $valueSet = FALSE;
            if ( $paramsIndexKey !== NULL && array_key_exists( $paramsIndexKey, $row ) ) {
                $keySet = TRUE;
                $key    = (string) $row[ $paramsIndexKey ];
            }
            if ( $paramsColumnKey === NULL ) {
                $valueSet = TRUE;
                $value    = $row;
            } elseif ( is_array( $row ) && array_key_exists( $paramsColumnKey, $row ) ) {
                $valueSet = TRUE;
                $value    = $row[ $paramsColumnKey ];
            }

            $possibleValue = arrayColumnRecursive( $row, $paramsColumnKey, $paramsIndexKey );
            if ( $possibleValue ) {
                $resultArray = array_merge( $possibleValue, $resultArray );
            }

            if ( $valueSet ) {
                if ( $keySet ) {
                    $resultArray[ $key ] = $value;
                } else {
                    $resultArray[ ] = $value;
                }
            }
            
            if(!empty($resultArray)) {
                return $resultArray;
            }
        }

        return $resultArray;
    }

}
