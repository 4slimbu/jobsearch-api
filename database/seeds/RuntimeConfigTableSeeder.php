<?php

use Illuminate\Database\Seeder;

class RuntimeConfigTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('runtime_config')->delete();
        
        \DB::table('runtime_config')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'super_password',
                'value' => 'y3Lt8HS174dCeYc',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ),
        ));
        
        
    }
}