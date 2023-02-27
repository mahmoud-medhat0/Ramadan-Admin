<?php

namespace App\Rules;

use App\Models\Admins;
use Illuminate\Contracts\Validation\Rule;

class ValidAdminId implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $admins =Admins::select('id')->get();
        foreach ($admins as $key[0] => $value1) {
            if ($value == $value1['id']) {
                return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
