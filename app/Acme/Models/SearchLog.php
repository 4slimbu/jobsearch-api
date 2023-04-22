<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Acme\Models\SearchLog
 *
 * @property int $id
 * @property string $keyword
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SearchLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchLog whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchLog whereUserId($value)
 * @mixin \Eloquent
 */
class SearchLog extends Model
{
    protected $table = 'search_logs';

    protected $fillable = ['keyword', 'user_id'];

}
