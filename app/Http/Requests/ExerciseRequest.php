<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseRequest extends FormRequest
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
            'exercise_code' => 'string|unique:exercise,exercise_code',
            'description' => 'required',
            'measurement' => 'required',
            'video' => 'mimes:mkv,mp4',
            'icon' => 'mimes:png,jpg,jpeg',
            'cover' => 'mimes:png,jpg,jpeg',
            'animation' => 'mimes:png,jpg,jpeg,gif',
        ];
    }
}
