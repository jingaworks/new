<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CuiNumber;
use App\Rules\PhoneNumber;
use App\Rules\ValidPlace;

class CreateCustomerRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'cui' => ['required', 'unique:customers', 'digits_between:2,10', new CuiNumber],
            'phone' => ['required', 'unique:customers', new PhoneNumber],
            'region' => ['required', 'string', 'max:70', 'exists:regions,denj'],
            'place' => ['required', 'string', 'max:70', 'exists:places,denloc', new ValidPlace($this->region)],
            'address' => ['required', 'string', 'min:5', 'max:300'],
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
            'name.required' => 'Numele Societatii este obligatorie!',
            'name.string' => 'Fara caractere speciale!',
            'name.min' => 'Minim 3 caractere!',
            'name.max' => 'Minim 100 caractere!',
            
            'cui.required'  => 'CUI/CIF este obligatorui!',
            'cui.unique'  => 'CUI/CIF este in uz!',
            'cui.digits_between'  => 'CUI/CIF este intre 2 si 10 cifre!',
            
            'phone.required'  => 'Numarul de telefon este obligatorui!',
            'phone.unique'  => 'Numarul de telefon este in uz!',
            
            'region.required'  => 'Judetul este obligatoriu!',
            'region.string'  => 'Fara caractere speciale!',
            'region.max' => 'Minim 70 caractere!',
            'region.exists' => 'Judetul nu exista!',
            
            'place.required'  => 'Localitatea este obligatorie!',
            'place.string'  => 'Fara caractere speciale!',
            'place.max' => 'Minim 70 caractere!',
            'place.exists' => 'Localitatea nu exista!',
            
            'address.required'  => 'Adresa este obligatorie!',
            'address.string'  => 'Fara caractere speciale!',
            'address.min' => 'Minim 5 caractere!',
            'address.max' => 'Minim 300 caractere!',
        ];
    }
}
