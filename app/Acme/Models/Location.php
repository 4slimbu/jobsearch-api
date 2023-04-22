<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Acme\Models\Location
 *
 * @property int $id
 * @property int|null $parent_location_id
 * @property string $type
 * @property string|null $label
 * @property string|null $display_label
 * @property int|null $suburb_location_id
 * @property string|null $suburb_name
 * @property int|null $area_location_id
 * @property string|null $area_name
 * @property int|null $region_location_id
 * @property string|null $region_name
 * @property int|null $state_location_id
 * @property string|null $state_code
 * @property string|null $state_name
 * @property int|null $country_location_id
 * @property string|null $country_code
 * @property string|null $country_name
 * @property string|null $post_code
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int $available_jobs
 * @property int $population_aggregated
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Acme\Models\Post[] $post
 * @property-read int|null $post_count
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereAreaLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereAreaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereAvailableJobs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCountryLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereDisplayLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereParentLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePopulationAggregated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereRegionLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereRegionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereStateCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereStateLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereStateName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereSuburbLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereSuburbName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Location extends Model
{
    protected $table = 'core_locations';

    public function post()
    {
        return $this->hasMany(Post::class, 'location_id');
    }
}