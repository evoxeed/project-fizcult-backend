<?php

namespace App\Services\Authenticate;

use App\Models\User;
use App\Services\Authenticate\DTO\SignInDTO;
use App\Services\Authenticate\Exception\InvalidCredentialsException;
use Illuminate\Support\Facades\Hash;
use Psr\SimpleCache\InvalidArgumentException;

class SignInService
{
    /**
     * @param UserAuthKeyService $userAuthKeyService
     */
    public function __construct(
        private UserAuthKeyService $userAuthKeyService
    ) {
    }

    /**
     * @param SignInDTO $loginDTO
     * @return string
     * @throws InvalidCredentialsException
     * @throws InvalidArgumentException
     */
    public function signIn(SignInDTO $loginDTO): string
    {
        $login = $loginDTO->getLogin();
        $password = $loginDTO->getPassword();

        $credentials = [
            'login' => $login,
            'is_active' => true,
        ];

        $user = User::query()->where($credentials)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            throw new InvalidCredentialsException('Invalid credentials');
        }

        $this->userAuthKeyService->saveNewAuthKeyToCache($user->id);

        return $this->userAuthKeyService->getSavedNewAuthKey();
    }
}
