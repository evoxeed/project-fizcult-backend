<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Authenticate\AuthKeyCache;
use App\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\SimpleCache\InvalidArgumentException;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $context = $this;

        $this->app->bind(UserInterface::class, static function () use ($context) {
            return $context->makeUser();
        });
    }

    /**
     * @return UserInterface|null
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws InvalidArgumentException
     */
    private function makeUser(): ?UserInterface
    {
        /** @var Request $request */
        $request = $this->app->get(Request::class);

        $authKey = $request->get('auth_key', $request->bearerToken());
        if ($authKey === null) {
            return null;
        }

        /** @var AuthKeyCache $authKeyCacheService */
        $authKeyCacheService = $this->app->get(AuthKeyCache::class);
        $id = $authKeyCacheService->getUserId($authKey);

        /** @var UserInterface $user */
        $user = User::query()->where(['id' => $id])->first();

        return $user;
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
    }
}
