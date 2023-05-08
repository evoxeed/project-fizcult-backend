<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    private const METHOD_OPTIONS = 'OPTIONS';

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age' => '86400',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With'
        ];

        if ($request->isMethod(self::METHOD_OPTIONS)) {
            return response()->json(['method' => self::METHOD_OPTIONS], 200, $headers);
        }

        $response = $next($request);
        foreach($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}
