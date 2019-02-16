<?php

namespace App\Acme\Models;

use App\Acme\Traits\JobTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_title',
        'post_body',
        'location_id',
        'category_id',
    ];

    protected $with = [
        'location', 'category',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}