<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class Captcha implements Rule
{
    public function passes($attribute, $value): bool
    {
        // TODO: Implement passes() method.
        $recaptcha = new Recaptcha(env('CAPTCHA_SECRET'));
        $response = $recaptcha->verify($value, $_SERVER['REMOVE_ADDR']);
        return $response->isSuccess();
    }

    public function message(): string
    {
        // TODO: Implement message() method.
        return 'Please check captcha!';
    }
}
