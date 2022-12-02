<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseSessionRequest extends FormRequest
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
            'exercisersession_code' => 'string|unique:exercise,exercise_code',
            'description' => 'required',
            'icon' => 'mimes:png,jpg,jpeg',
            'cover' => 'mimes:png,jpg,jpeg',
        ];
    }
}
