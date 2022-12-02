<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurriculumRequest extends FormRequest
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
            'name' => 'required|string',
            'slug' => 'string',
            'curriculum_code' => 'unique:curriculum,curriculum_code',
            'active_years' => 'required',
            'icon' => 'mimes:png,jpg',
            'cover' => 'mimes:png,jpg',
        ];
    }
}
