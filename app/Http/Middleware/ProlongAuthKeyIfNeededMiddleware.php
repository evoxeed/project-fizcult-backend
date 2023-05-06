<?php

namespace App\Http\Middleware;

use App\Services\Authenticate\AuthKeyCache;
use Closure;
use Illuminate\Http\Request;

class ProlongAuthKeyIfNeededMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $authKey = $request->get('auth_key', $request->bearerToken());
        if ($authKey === null) {
            return $next($request);
        }

        /** @var AuthKeyCache $authKeyCache */
        $authKeyCache = app()->make(AuthKeyCache::class);

        if ($authKeyCache->has($authKey)) {
            $authKeyCache->prolong($authKey);
        }

        return $next($request);
    }
}
