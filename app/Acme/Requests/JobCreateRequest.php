<?php

namespace App\Acme\Requests;

class JobCreateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_id' => 'integer|nullable',
            'brand_is_hidden' => 'integer|required',
            'job_logo_url' => 'string|nullable',
            'employer_name' => 'string|nullable',
            'job_title' => 'string|required',
            'job_body' => 'string|nullable',
            'location_id' => 'integer|nullable',
            'category_id' => 'integer|nullable',
            'occupation_id' => 'integer|nullable',
	        'reference_number' => 'string|nullable',
            'pay_type_id' => 'integer|nullable',
            'pay_is_hidden' => 'boolean|nullable',
            'pay_band_min' => 'regex:/^[0-9]{1,8}$/|nullable',
            'pay_band_max' => 'regex:/^[0-9]{1,8}$/|nullable',
            'pay_description' => 'string|nullable',
            'attribute_option_ids' => 'array',
        ];
    }
}