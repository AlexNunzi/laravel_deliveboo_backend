<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'token' => 'required',
            'foods_info' => 'required',
            'foods_info.*.id' => 'required|numeric',
            'foods_info.*.quantity' => 'required|numeric|gt:0',
            'customer_name' => 'required',
            'customer_phone_number' => 'required|numeric',
            'customer_address' => 'required',
            'customer_email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Il nome è obbligatorio',
            'customer_phone_number.required' => 'Il numero di telefono è obbligatorio',
            'customer_phone_number.numeric' => 'Il numero di telefono non può contenere lettere',
            'customer_address.required' => "La via è obbligatoria",
            'customer_email.required' => "L'email è obbligatoria",
            'customer_email.email' => "L'email deve avere un formato coerente (es. info@deliveboo.com)",
        ];
    }
}
