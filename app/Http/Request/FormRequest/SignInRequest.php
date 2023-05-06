<?php

namespace App\Http\Request\FormRequest;

class SignInRequest extends SimpleRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return (string) $this->get('login');
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return (string) $this->get('password');
    }
}
