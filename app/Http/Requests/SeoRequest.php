<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
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
            //
            'author' => 'required',
            'title' => 'required',
            'description' => 'required',
            'site_name' => 'required',
            'image_alt' => 'required',
            'keywords' => 'required',
            'service_id' => 'required|integer'
        ];
    }
}
