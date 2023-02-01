<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addToCartRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_name' => 'required',
            'order_phone' => 'required|numeric',
            'order_email' => 'email',
            'order_address' => 'required',
            'order_notes' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'order_name.required' => 'Name field can not be null',
            'order_phone.numeric' => 'Phone number must be number',
            'order_phone.required' => 'Phone number can not be null',
            'order_address.required' => 'Address can not be null',
            'order_email.email' => 'Email must be the validated email'
        ];
    }
}
