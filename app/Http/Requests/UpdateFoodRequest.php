<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
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
            'restaurant_id' => 'nullable|exists:restaurants,id',
            'name' => 'required|max:150|unique:foods',
            'price' => 'required|decimal:2',
            'description' => 'nullable|max:',
            'image' => 'nullable|',
            'visibility' => 'required|boolean',
        ];
    }
}
