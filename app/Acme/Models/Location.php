<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'core_locations';

    public function job()
    {
        return $this->hasMany(JobEcomm::class, 'location_id');
    }

	public function locationType()
	{
		return $this->belongsTo(LocationType::class, 'type', 'type');
    }
}