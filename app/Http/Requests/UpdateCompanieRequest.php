<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CuiNumber;
use App\Rules\PhoneNumber;
use App\Rules\ValidPlace;

class UpdateCompanieRequest extends FormRequest
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
            'cui' => ['required', 'unique:companii,cui,' . auth()->user()->producator->companie->id, 'digits_between:2,10', new CuiNumber],
            'phone' => ['required', 'unique:companii,phone,' . auth()->user()->producator->companie->id, new PhoneNumber],
            'region' => ['required', 'string', 'max:70', 'exists:regions,denj'],
            'place' => ['required', 'string', 'max:70', 'exists:places,denloc', new ValidPlace($this->region)],
            'address' => ['required', 'string', 'min:5', 'max:300'],
        ];
    }
}
