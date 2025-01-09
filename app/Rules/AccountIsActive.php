<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;

class AccountIsActive implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('email', $value)->first();

        if ($user && $user->status !== 'active') {
            $fail($this->message());
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Your account is disabled by admin. Please contact admin support.';
    }
}
