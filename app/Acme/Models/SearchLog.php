<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $table = 'search_logs';

    protected $fillable = ['keyword', 'user_id'];

}
