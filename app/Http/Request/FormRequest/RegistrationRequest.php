<?php

namespace App\Http\Request\FormRequest;

class RegistrationRequest extends SimpleRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'login' => ['required', 'string', 'max:500', 'unique:user'],
            'password' => ['required', 'min:6', 'max:500'],
            'first_name' => ['min:3'],
            'last_name' => ['min:3'],
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

    /**
     * @return ?string
     */
    public function getFirstName(): ?string
    {
        return (string) $this->get('first_name');
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return (string) $this->get('last_name');
    }
}
