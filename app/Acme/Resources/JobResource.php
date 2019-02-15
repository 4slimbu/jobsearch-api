<?php

namespace App\Acme\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $job = [
            'id' => (integer)$this->id,
            'uuid' => (string)$this->uuid,
            'user_id' => (integer)$this->user_id,
            'occupation_id' => (integer)$this->occupation_id,
            'title' => (string)$this->job_title,
            'body' => (string)$this->job_body,
            'reference_number' => (string)$this->reference_number,
            'brand_is_hidden' => (boolean)$this->brand_is_hidden,
            'bucket_code' => (string)$this->bucket_code,
            'application_preference_id' => (integer)(($this->apply_type_id == 2 || $this->apply_type_id == 3) ?2:1),
            'apply_url' => (string)$this->apply_url,
            'apply_link_type' => (integer)$this->apply_link_type, // TODO need to check
            'apply_email' => (string)$this->apply_email,
            'employer_name' => (string)$this->employer_name,
            'logo' => (string)$this->job_logo_url,
            'slug' => (string)str_slug($this->job_title),
            'pay_band_min' => (float)$this->pay_band_min,
            'pay_band_max' => (float)$this->pay_band_max,
            'pay_is_hidden' => (boolean)$this->pay_is_hidden,
            'pay_description' => (string)$this->pay_description,
            'status' => (string)$this->status,
            'activates_at' => (string)$this->activates_at,
            'expires_at' => (string)$this->expires_at,
            'original_expires_at' => (string)$this->original_expires_at,
            'created_at' => (string)$this->created_at,
            'ecomm_package_id' => (integer)$this->ecomm_package_id,
            $this->mergeWhen($this->relationLoaded('applications'), [
                'applications_count' => $this->applications ? $this->applications->count() : 0,
                'applications_new_count' => $this->applications ? $this->applications->where('status', 'new')->count() : 0,
            ]),
            $this->mergeWhen($this->relationLoaded('applyClicks'), [
                'apply_clicks_count' => $this->applyClicks ? $this->applyClicks->count() : 0,
            ]),
            'location' =>  new LocationResource($this->whenLoaded('location')),
            'applyType' => new ApplyTypeResource($this->whenLoaded('applyType')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'brand' => new BrandResource($this->whenLoaded('brand')),
            'payType' => new PayTypeResource($this->whenLoaded('payType')),
            'notificationFrequency' => new NotificationFrequencyResource($this->whenLoaded('notificationFrequency')),
        ];

        //$attributes = $this->attributeOptions;

        if($this->attributeOptions) {
	        $job['attributes'] = $this->whenLoaded('attributeOptions')
	                                  ->groupBy('attribute.name')
	                                  ->map(function($item) {
		                                  $first = $item->first();
		                                  return [
			                                  'id' => (integer)$first->attribute->id,
			                                  'name' => (string)$first->attribute->name,
			                                  'options' => $item->map(function($i) {
				                                  return [
					                                  'id' => (integer)$i->id,
					                                  'value' => (string)$i->value,
				                                  ];
			                                  }),
		                                  ];
	                                  })->values();
        }
        return $job;

    }
}