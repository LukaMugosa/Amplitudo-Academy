<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeworkRequest extends FormRequest
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
            'homework1' => 'required',
            'homework' => 'required|mimes:zip,rar'
        ];
    }

    public function messages()
    {
        return [
            'homework1.required' => 'Please select homework title!',
            'homework.required' => 'Please include your file!',
            'homework.mimes' => 'The selected file must be a .zip or .rar file!',
        ];
    }
}
