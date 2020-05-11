<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadProjects extends FormRequest
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
            'project1' => 'required',
            'project' => 'required|mimes:zip,rar'
        ];
    }

    public function messages()
    {
        return [
            'project1.required' => 'Please select project title!',
            'project.required' => 'Please include your file!',
            'project.mimes' => 'The selected file must be a .zip or .rar file!',
        ];
    }
}
