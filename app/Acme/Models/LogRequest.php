<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Acme\Models\LogRequest
 *
 * @property int $id
 * @property string $context A label describing/identifying the request
 * @property string|null $response_code The HTTP response code sent
 * @property string|null $request_url The URL requested
 * @property string|null $request_origin The host information of the request caller
 * @property string|null $content The content of the request
 * @property string|null $response The content of the response message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereRequestOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereRequestUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereResponseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LogRequest extends Model
{
    /**
     * @var string
     */
    protected $table = 'log_requests';

    /**
     * @var array
     */
    protected $guarded = [];
}
