<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Producator;

class ValidNumber implements Rule
{
    private $serie;
    private $numar;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($serie, $numar)
    {
        $this->serie = $serie;
        $this->numar = $numar;
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
        $result = Producator::where('serie', $this->serie)->where('numar', $this->numar)->first();

        return $result ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->serie . ' ' . $this->numar . ' este in uz!';
    }
}
