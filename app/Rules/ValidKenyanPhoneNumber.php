<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final readonly class ValidKenyanPhoneNumber implements ValidationRule
{
    /**
     * Accepted formats:
     * - 07XXXXXXXX
     * - 01XXXXXXXX
     * - +2547XXXXXXXX
     * - +2541XXXXXXXX
     * - 2547XXXXXXXX
     * - 2541XXXXXXXX
     */
    private const string REGEX = '/^(?:\+254|254|0)(?:7|1)\d{8}$/';

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        assert(is_string($value));

        if (in_array(preg_match(self::REGEX, $value), [0, false], true)) {
            $fail('The :attribute must be a valid Kenyan mobile phone number.');
        }
    }
}
