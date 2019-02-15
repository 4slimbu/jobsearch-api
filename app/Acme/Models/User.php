<?php

namespace App\Acme\Models;

use App\Acme\Models\Core\CoreAccount;
use App\Acme\Models\Core\CoreProduct;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    protected $table = 'core_users';

    protected $dates = [
        'deleted_at',
    ];

    protected $fillable = [
        'id', 'account_id', 'first_name', 'last_name', 'contact_number', 'email', 'password', 'verified', 'email_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'full_name',
    ];

    protected $with = [
        'account',
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

    public function account()
    {
        return $this->belongsTo(CoreAccount::class, 'account_id');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'core_brand_user', 'user_id', 'brand_id');
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

    public function inventories()
    {
        return CoreProduct::with(['accountInventory' => function ($query){
            $query->where('account_id', $this->account_id);
        }])->get();
    }

    /**
     * Gets the first inventory record which has qty_available, or is_unlimited. Unlimited inventory items trump all and
     * will be returned first.
     *
     * @return mixed
     */
    public function getAvailableInventory($productId)
    {
        return $this->account->inventories()
            ->where(function ($query) {
                $query->where('qty_available', '>', 0)->orWhere('is_unlimited', '<>', 0);
            })
            ->where('product_id', $productId)
            ->orderByRaw('`is_unlimited` DESC, `id` ASC')
            ->first();
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

        if (!empty($params['account_id'])) {
            $query = $query->where('account_id', '=',$params['account_id']);
        }

        if (!empty($params['orderBy'])) {
            $query = $query->orderBy($params['orderBy'] === 'full_name' ? 'first_name' : $params['orderBy'], $params['ascending'] ? 'ASC' : 'DESC');
        }

        return $query;
    }
}
