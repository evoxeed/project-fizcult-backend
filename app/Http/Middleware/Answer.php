<?php

namespace App\Http\Middleware;

use Closure;

class Answer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $responce = $next($request);

        if($responce->status() == 200) return [
            'result'=>'ok',
            'data'=>$responce->getOriginalContent()
        ];
        return [
            'result'=>'error',
            'error'=>$responce->status(),
            'text'=>$responce->getOriginalContent()
        ];
    }
}
