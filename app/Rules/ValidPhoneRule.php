<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class ValidPhoneRule
 * @package App\Rules
 */
class ValidPhoneRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match(
                '/^(\+?7|8)(-| ?)(\(?)([0-9]{3})( ?)(\)?)(-| ?)([0-9]{3})(-| ?)([0-9]{2})(-| ?)([0-9]{2})$/',
                $value
            ) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Неверный формат телефонного номера.';
    }
}
