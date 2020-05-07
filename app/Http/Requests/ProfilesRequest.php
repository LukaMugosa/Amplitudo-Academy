<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilesRequest extends FormRequest
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
            'description' => 'required|min:150|max:1000',
            'education' => 'min:20|max:200',
            'experience' => 'min:50|max:400',
            'address' => 'required|regex:/(.+), (\w+), (\w+) (\w+)/|min:10|max:150',
            'phone_number' => 'required|regex:/^[0-9\-\(\)\/\+\s]*$/',
            'skills' => 'min:15|max:255',
        ];
    }

    public function messages()
    {
        return [
            'address.regex' => 'Please include street name, city, state, zip.'
        ];
    }
}
