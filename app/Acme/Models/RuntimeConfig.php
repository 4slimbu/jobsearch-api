<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Acme\Models\RuntimeConfig
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RuntimeConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuntimeConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RuntimeConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|RuntimeConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuntimeConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuntimeConfig whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuntimeConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RuntimeConfig whereValue($value)
 * @mixin \Eloquent
 */
class RuntimeConfig extends Model
{
   protected $table = 'runtime_config';

    public static function getValue($key)
    {
        $output = self::where('name', $key)->first();
        return !empty($output->value) ? $output->value : '';
    }
}
