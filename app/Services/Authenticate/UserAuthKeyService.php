<?php

namespace App\Services\Authenticate;

use Psr\SimpleCache\InvalidArgumentException;

class UserAuthKeyService
{
    private string $savedNewAuthKey;

    /**
     * @param AuthKeyGeneratorService $authKeyGeneratorService
     * @param AuthKeyCache $authKeyCache
     */
    public function __construct(
        private AuthKeyGeneratorService $authKeyGeneratorService,
        private AuthKeyCache $authKeyCache,
    ) {
    }

    /**
     * @param int $userId
     * @return void
     * @throws InvalidArgumentException
     */
    public function saveNewAuthKeyToCache(int $userId): void
    {
        $this->savedNewAuthKey = $this->authKeyGeneratorService->generateAuthKey($userId);

        $this->authKeyCache->set($this->savedNewAuthKey, $userId);
    }

    /**
     * @return string
     */
    public function getSavedNewAuthKey(): string
    {
        return $this->savedNewAuthKey;
    }
}
