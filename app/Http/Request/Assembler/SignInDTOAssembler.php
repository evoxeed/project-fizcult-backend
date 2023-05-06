<?php

namespace App\Http\Request\Assembler;

use App\Http\Request\FormRequest\SignInRequest;
use App\Services\Authenticate\DTO\SignInDTO;

class SignInDTOAssembler
{
    /**
     * @param SignInRequest $request
     * @return SignInDTO
     */
    public function create(SignInRequest $request): SignInDTO
    {
        return new SignInDTO(
            login: $request->getLogin(),
            password: $request->getPassword(),
        );
    }
}
