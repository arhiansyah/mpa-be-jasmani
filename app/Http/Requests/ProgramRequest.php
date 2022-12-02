<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
{
    /**p
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
            'program_code' => 'string|unique:program_studies,program_code',
            'description' => 'required',
            'icon' => 'mimes:png,jpg',
            'image' => 'mimes:png,jpg'
        ];
    }
}
