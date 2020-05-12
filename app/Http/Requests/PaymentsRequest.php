<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentsRequest extends FormRequest
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
            'credit_card_number' => ['required','regex:/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$/'],
            'name' => ['required','regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/'],
            'expires' => ['required','regex:/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/'],
            'cvc' => 'required|regex:/^[0-9]{3,4}$/',
        ];
    }

    public function messages()
    {
        return [
            'credit_card_number.required' => 'Credit card field is required!',
            'credit_card_number.regex' => 'You must enter a valid credit card number!',
            'name.regex' => 'You must enter a valid name!',
            'expires.regex' => 'You must enter a valid expiration date!',
            'cvc.regex' => 'You must enter a valid CVV number!'
        ];
    }
}
