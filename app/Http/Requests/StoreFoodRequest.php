<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
            'name' => 'required|string|max:150|unique:food',
            'price' => 'required|decimal:0,2|max:99.99',
            'description' => 'nullable|string|max:2000',
            'image' => 'nullable|image|max:1024',
        ];
    }
}
