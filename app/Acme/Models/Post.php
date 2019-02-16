<?php

namespace App\Acme\Models;

use App\Acme\Traits\JobTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    static public $POST_IMAGES_AWS_PATH = 'loksewa/{userId}/{postId}';

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
        'media', 'location', 'category', 'comments'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'post_id');
    }

}