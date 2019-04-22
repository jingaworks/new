<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSubcategoryRequest extends FormRequest
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
            'category' => ['required', 'exists:categories,id'],
            'product' => ['required', 'min:3', 'unique:subcategories,nume']
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category.required' => 'Categoria este obligatorie!',
            'category.exists' => 'Categoria nu exista!',
            'product.required' => 'Numele produsului este obligatoriu!',
            'product.min' => 'Minim 3 caractere!',
            'product.unique' => 'Produsul ales exista!',
        ];
    }
}
