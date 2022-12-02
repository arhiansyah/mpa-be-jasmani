<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RunningProgramRequest extends FormRequest
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
            'running_program_code' => 'string',
            // 'program_study_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'period' => 'required',
            'curriculum_id' => 'required|int',
            'icon' => 'mimes:png,jpg',
            'cover' => 'mimes:png,jpg'
        ];
    }
}
