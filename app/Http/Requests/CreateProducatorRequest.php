<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProducatorRequest extends FormRequest
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
            'titular' => ['required', 'string', 'min:5', 'max:150'], 
            'serie' => ['required', 'string', 'size:2', 'exists:regions,mnemonic'], 
            'numar' => ['required', 'digits:7'], 
            'emitent' => ['required', 'string', 'max:100', 'exists:places,denloc'], 
            'judet' => ['required', 'string', 'max:100', 'exists:regions,denj'], 
            'viza' => ['required', 'digits:4', 'starts_with:20']
        ];
    }
}
