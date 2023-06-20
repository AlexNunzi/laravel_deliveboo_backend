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

    public function messages()
    {
        return[
            'name.required' => 'Il nome è obbligatorio',
            'name.string' => 'Il nome deve essere una stringa',
            'name.unique' => 'Il nome del cibo deve essere unico',
            'name.max' => 'Il nome deve avere al massimo :max caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.decimal' => 'Il prezzo deve avere al massimo due cifre decimali',
            'price.max' => 'Il prezzo può essere al massimo di :max €',
            'description.string' => "La descrizione deve essere una stringa",
            'description.max' => "La descrizione deve avere al massimo :max caratteri",
            'image.image' => "L'immagine deve essere un file di tipo immagine",
            'image.max' => "L'immagine deve pesare al massimo :max KB",
        ];
    }
}
