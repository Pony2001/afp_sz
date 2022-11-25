<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class FieldRules implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        for ($i = 0; $i < count($value); $i++) {
            if ((count(array_unique($value)) !== count($value)) && (is_null($value[$i]))) {
                $fail('Valamely mező üres, illetve kétszer vagy többször adta meg ugyanazt az opciót.');
            } else if (is_null($value[$i])) {
                $fail('Valamely mező üres.');
            }
        }
        if (count(array_unique($value)) !== count($value)) {
            $fail('Kétszer vagy többször adta meg ugyanazt az opciót.');
        }
    }
}
