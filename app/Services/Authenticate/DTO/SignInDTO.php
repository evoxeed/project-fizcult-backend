<?php

namespace App\Services\Authenticate\DTO;

class SignInDTO
{
    /**
     * @param string $login
     * @param string $password
     */
    public function __construct(
        private string $login,
        private string $password,
    ) {
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
