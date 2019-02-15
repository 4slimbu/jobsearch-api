<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'core_media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entity_type_id', 'is_primary', 'media_type_id', 'value', 'user_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}