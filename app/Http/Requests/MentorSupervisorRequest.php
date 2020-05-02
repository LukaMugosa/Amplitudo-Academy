<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorSupervisorRequest extends FormRequest
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
            'name' => ['required','regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/'],
            "email" => "required|email|unique:users",
            'password1' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'password2' => 'required|same:password1'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'This field is required',
            'name.regex' => 'You must enter a valid full name',
            'password1.regex' => 'Your password must contain at least one uppercase letter, one lowercase letter and one number'
        ];
    }
}
