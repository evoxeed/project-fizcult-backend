<?php

namespace App\Http\Controllers;

use App\Http\Request\Assembler\SignInDTOAssembler;
use App\Http\Request\FormRequest\SignInRequest;
use App\Services\Authenticate\Exception\InvalidCredentialsException;
use App\Services\Authenticate\SignInService;
use Laravel\Lumen\Routing\Controller;
use Psr\SimpleCache\InvalidArgumentException;

class SignInController extends Controller
{
    /**
     * @param SignInRequest $request
     * @param SignInDTOAssembler $loginDTOAssembler
     * @param SignInService $loginService
     * @return array
     * @throws InvalidCredentialsException
     * @throws InvalidArgumentException
     */
    public function signIn(
        SignInRequest $request,
        SignInDTOAssembler $loginDTOAssembler,
        SignInService $loginService
    ): array {
        $signInDTO = $loginDTOAssembler->create($request);
        $token = $loginService->signIn($signInDTO);

        return [
            'auth_token' => $token,
        ];
    }
}
