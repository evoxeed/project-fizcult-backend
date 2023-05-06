<?php

namespace App\Http\Request\Assembler;

use App\Http\Request\FormRequest\RegistrationRequest;
use App\Services\Registration\DTO\RegistrationDTO;

class RegistrationDTOAssembler
{
    /**
     * @param RegistrationRequest $request
     * @return RegistrationDTO
     */
    public function create(RegistrationRequest $request): RegistrationDTO
    {
        return new RegistrationDTO(
            login: $request->getLogin(),
            password: $request->getPassword(),
            firstName: $request->getFirstName(),
            lastName: $request->getLastName(),
        );
    }
}
