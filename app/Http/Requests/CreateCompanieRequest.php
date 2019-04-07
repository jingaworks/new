<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanieRequest extends FormRequest
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
            'nume' => ['required', 'string', 'min:3', 'max:190'], 
            'cui' => ['required', 'digits:7'], 
            'judet' => ['required', 'string', 'max:100', 'exists:regions,denj'], 
            'localitate' => ['required', 'string', 'max:100', 'exists:places,denloc'], 
            'adresa' => ['nullable', 'string', 'max:190'] 
        ];
    }
}
