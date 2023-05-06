<?php

namespace App\Services\Registration;

use App\Models\User;
use App\Services\Registration\DTO\RegistrationDTO;
use App\Services\Registration\Exception\UserAlreadyExistsException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RegistrationService
{
    /**
     * @param RegistrationDTO $registrationDTO
     * @return Builder|Model
     * @throws UserAlreadyExistsException
     */
    public function register(RegistrationDTO $registrationDTO): Model|Builder
    {
        $login = $registrationDTO->getLogin();
        $isUserExists = User::query()->where(['login' => $login])->exists();

        if ($isUserExists) {
            throw new UserAlreadyExistsException("User with login [$login]");
        }

        return User::query()->create([
            'login' => $login,
            'password' => $registrationDTO->getPassword(),
            'first_name' => $registrationDTO->getFirstName(),
            'last_name' => $registrationDTO->getLastName(),
        ]);
    }
}
