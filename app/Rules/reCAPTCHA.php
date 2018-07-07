<?php

namespace BCES\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class reCAPTCHA implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $client = new Client();

        $request = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('GOOGLE_CAPTCHA_SECRET'),
                'response' => $value,
                'remoteip' => request()->ip()
            ]
        ]);

        $response = \GuzzleHttp\json_decode($request->getBody(), true);

        return $response['success'];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'reCAPTCHA is not valid.';
    }
}
