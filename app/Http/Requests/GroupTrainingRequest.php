<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupTrainingRequest extends FormRequest
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
            'grouptraining_code' => 'string|unique:group_trainings,grouptraining_code',
            'description' => 'required',
            'icon' => 'mimes:png,jpg,jpeg',
            'cover' => 'mimes:png,jpg,jpeg',
        ];
    }
}
