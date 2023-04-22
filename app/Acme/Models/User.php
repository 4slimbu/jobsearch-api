<?php

namespace App\Acme\Models;

use App\Acme\Models\Core\CoreProduct;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
/**
 * App\Acme\Models\User
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string|null $username
 * @property string|null $gender
 * @property string|null $contact_number
 * @property array|null $preferences
 * @property string $password
 * @property int $verified
 * @property string|null $email_token
 * @property string|null $remember_token
 * @property int $is_active
 * @property string|null $profile_pic
 * @property string|null $address
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|null $fb_id
 * @property string|null $device_id
 * @property string|null $last_login_date
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Acme\Models\UserEmailReset|null $emailReset
 * @property-read mixed $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Acme\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Acme\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User email($email)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter($params)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFbId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePreferences($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerified($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    protected $table = 'core_users';

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'id', 'first_name', 'last_name', 'gender', 'contact_number', 'email', 'preferences', 'password', 'verified', 'email_token',
        'profile_pic', 'fb_id', 'device_id', 'address', 'latitude', 'longitude'
    ];

    protected $casts = [
        'preferences' => 'array'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'full_name',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }

    public function emailReset()
    {
        return $this->hasOne(UserEmailReset::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'core_role_user');
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles);
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    
    public function getFullNameAttribute()
    {
        $output = '';
        if (!empty($this->attributes['first_name'])) {
            $output .= $this->attributes['first_name'];
        }

        if (!empty($output) && !empty($this->attributes['last_name'])) {
            $output = $output . ' ' . $this->attributes['last_name'];
        }

        return $output;
    }

    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    public function scopeFilter($query, $params)
    {
        if (!empty($params['full_name'])) {
            $query = $query->where(function($q) use ($params) {
                $q->where('first_name', 'LIKE', '%' . $params['full_name'] . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $params['full_name'] . '%');
            });
        }

        if (!empty($params['email'])) {
            $query = $query->where('email', 'LIKE', '%' . $params['email'] . '%');
        }

        if (!empty($params['orderBy'])) {
            $query = $query->orderBy($params['orderBy'] === 'full_name' ? 'first_name' : $params['orderBy'], $params['ascending'] ? 'ASC' : 'DESC');
        }

        return $query;
    }
}
