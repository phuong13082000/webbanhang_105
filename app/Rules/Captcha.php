<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class Captcha implements Rule
{
    public function passes($attribute, $value)
    {
        // TODO: Implement passes() method.
        $recaptcha = new Recaptcha(env('RECAPTCHA_SECRET'));
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
        return $response->isSuccess();
    }

    public function message()
    {
        // TODO: Implement message() method.
        return 'Please check captcha!';
    }
}
