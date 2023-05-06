<?php

namespace App\Http\Controllers;

use App\Http\Request\Assembler\RegistrationDTOAssembler;
use App\Http\Request\FormRequest\RegistrationRequest;
use App\Http\Response\Formatter\UserFormatter;
use App\Models\User;
use App\Services\Registration\Exception\UserAlreadyExistsException;
use App\Services\Registration\RegistrationService;

class RegistrationController
{
    /**
     * @param RegistrationRequest $request
     * @param RegistrationDTOAssembler $registrationDTOAssembler
     * @param RegistrationService $registrationService
     * @param UserFormatter $formatter
     * @return array
     * @throws UserAlreadyExistsException
     */
    public function register(
        RegistrationRequest $request,
        RegistrationDTOAssembler $registrationDTOAssembler,
        RegistrationService $registrationService,
        UserFormatter $formatter
    ): array {
        $registrationDTO = $registrationDTOAssembler->create($request);

        /** @var User $user */
        $user = $registrationService->register($registrationDTO);

        return $formatter->format($user);
    }
}
