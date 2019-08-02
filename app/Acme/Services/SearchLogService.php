<?php

namespace App\Acme\Services;

use App\Acme\Models\SearchLog;

class SearchLogService
{
    public static function log($keyword, $user_id)
    {
        try {
            SearchLog::create([
                'keyword' => $keyword,
                'user_id' => $user_id
            ]);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            die();
        }
    }
}