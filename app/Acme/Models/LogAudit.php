<?php

namespace App\Acme\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Acme\Models\LogAudit
 *
 * @property int $id
 * @property string|null $application_code
 * @property string $context A label describing/identifying the request
 * @property string|null $data Information pertaining to the audit subject
 * @property string|null $state State detail, for example; Sent, Error, Aborted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit query()
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit whereApplicationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LogAudit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LogAudit extends Model
{

    protected $table = 'log_audit';

    protected $fillable = [
        'context', 'data', 'state',
    ];
}