<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentsRequest extends FormRequest
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
            'body' => 'required|min:20|max:100'
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Comment field is required!',
            'body.min' => 'Comment must contain at least 20 characters!',
            'body.max' => 'Comment must not contain more than 100 characters!',
        ];
    }
}
