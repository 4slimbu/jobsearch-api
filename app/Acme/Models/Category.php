<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'core_categories';

    public function occupations()
    {
        return $this->hasMany(Occupation::class, 'category_id');
    }
}
