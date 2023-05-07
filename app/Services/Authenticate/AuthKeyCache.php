<?php

namespace App\Services\Authenticate;

use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;

class AuthKeyCache
{
    private int $keyCacheTTLInSeconds = 3600;

    /**
     * @param CacheInterface $cache
     */
    public function __construct(
        private CacheInterface $cache,
    ) {
    }

    /**
     * @param string $authKey
     * @return void
     * @throws InvalidArgumentException
     */
    public function set(string $authKey, int $userId): void
    {
        $this->cache->set($authKey, $userId, $this->keyCacheTTLInSeconds);
    }

    /**
     * @param string $authKey
     * @return void
     * @throws InvalidArgumentException
     */
    public function delete(string $authKey): void
    {
        $this->cache->delete($authKey);
    }

    /**
     * @param string $authKey
     * @return bool
     * @throws InvalidArgumentException
     */
    public function has(string $authKey): bool
    {
        return $this->cache->has($authKey);
    }

    /**
     * @param string $authKey
     * @return ?int
     * @throws InvalidArgumentException
     */
    public function getUserId(string $authKey): ?int
    {
        return (int) $this->cache->get($authKey);
    }

    /**
     * @param string $authKey
     * @return void
     * @throws InvalidArgumentException
     */
    public function prolong(string $authKey): void
    {
        if (!$this->cache->has($authKey)) {
            throw new \InvalidArgumentException('Ключ не найден в кеше');
        }

        $value = $this->getUserId($authKey);
        $this->cache->set($authKey, $value, $this->keyCacheTTLInSeconds);
    }
}
