<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Acme\Models\LocationType
 *
 * @property string $type
 * @property int $priority
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Acme\Models\Location[] $location
 * @property-read int|null $location_count
 * @method static \Illuminate\Database\Eloquent\Builder|LocationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LocationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|LocationType wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LocationType whereType($value)
 * @mixin \Eloquent
 */
class LocationType extends Model
{
    protected $table = 'core_location_types';

    public function location()
	{
		return $this->hasMany(Location::class, 'type', 'type');
	}
}