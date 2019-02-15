<?php

namespace App\Acme\Models;

use App\Acme\Traits\JobTrait;
use Illuminate\Database\Eloquent\Model;

class JobEcomm extends Model
{
    use JobTrait;

    protected $table = 'smartfeed_in_ecomm_jobs';

    public static $STATUS_DRAFT = 'draft';
    public static $STATUS_PROCESSING = 'processing';
    public static $STATUS_UPDATING = 'updating';
    public static $STATUS_OPEN = 'open';
    public static $STATUS_EXPIRED = 'expired';
    public static $STATUS_PUBLISHED = 'published';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'account_id',
        'uuid',
        'brand_id',
        'brand_is_hidden',
        'job_logo_url',
        'employer_name',
        'job_title',
        'location_id',
        'category_id',
        'occupation_id',
        'job_body',
        'reference_number',
        'pay_type_id',
        'pay_is_hidden',
        'pay_band_min',
        'pay_band_max',
        'pay_description',
        'apply_type_id',
        'notification_frequency_id',
        'apply_url',
        'apply_email',
        'activates_at',
        'expires_at',
        'original_expires_at',
        'status',
        'auto_refresh',
        'bolded_listing',
        'exposer_careerone_ad_network',
        'remarketing',
        'ecomm_package_id',
    ];

    protected $with = [
        'location', 'applyType', 'category', 'brand', 'attributeOptions', 'payType', 'notificationFrequency'
    ];

    public function attributeOptions()
    {
        return $this->belongsToMany(AttributeOption::class, 'smartfeed_in_ecomm_job_attribute_options',
            'in_ecomm_job_id', 'attribute_option_id');
    }

    public function scopeOpen($query)
    {
        return $query->whereIn('status',
            [self::$STATUS_OPEN, self::$STATUS_UPDATING, self::$STATUS_PROCESSING, self::$STATUS_PUBLISHED]);
    }

    public function scopeDraft($query)
    {
        return $query->where('status', self::$STATUS_DRAFT);
    }

    public function scopeExpired($query)
    {
        return $query->where('status', self::$STATUS_EXPIRED);
    }

    public function scopeUuid($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }
}