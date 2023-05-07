<?php

namespace App\Http\Middleware;

use App\UserInterface;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class Authenticate
{
    /**
     * Create a new middleware instance.
     *
     * @param UserInterface|null $user
     */
    public function __construct(private ?UserInterface $user)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->user === null) {
            throw new UnauthorizedException('Unauthorized');
        }

        return $next($request);
    }
}
