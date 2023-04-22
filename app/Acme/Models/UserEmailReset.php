<?php

namespace App\Acme\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Acme\Models\UserEmailReset
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserEmailReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEmailReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserEmailReset query()
 * @mixin \Eloquent
 */
class UserEmailReset extends Model
{
    const UPDATED_AT = null;

    protected $table = 'user_email_resets';

    protected $fillable = [
        'email', 'token', 'created_at',
    ];
}
