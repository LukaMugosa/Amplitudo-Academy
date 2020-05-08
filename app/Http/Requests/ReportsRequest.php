<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportsRequest extends FormRequest
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
            'intended_user_id' => 'required',
            'title' => 'required|min:15|max:50',
            'body' => 'required|min:150|max:5000'
        ];
    }
    public function messages()
    {
        return [
            'intended_user_id.required' => 'Please select a user!',
        ];
    }
}
