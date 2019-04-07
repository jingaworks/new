<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidPlace;

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
            'region' => ['required', 'string', 'max:100', 'exists:regions,denj'], 
            'place' => ['required', 'string', 'max:70', 'exists:places,denloc', new ValidPlace($this->region)],
            'viza' => ['required', 'digits:4', 'starts_with:20']
        ];
    }
}
