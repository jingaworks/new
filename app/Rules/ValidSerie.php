<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Region;

class ValidSerie implements Rule
{
    private $reg;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($reg)
    {
        $this->reg = $reg;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $region = Region::where('denj', $this->reg)->first();

        return ($region) && ($value == $region->mnemonic) ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Seria aleasa nu face parte din Judetul ' . $this->reg;
    }
}
