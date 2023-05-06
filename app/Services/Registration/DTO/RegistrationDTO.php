<?php

namespace App\Services\Registration\DTO;

class RegistrationDTO
{
    /**
     * @param string $login
     * @param string $password
     * @param string|null $firstName
     * @param string|null $lastName
     */
    public function __construct(
        private string $login,
        private string $password,
        private ?string $firstName = null,
        private ?string $lastName = null,
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

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }
}
