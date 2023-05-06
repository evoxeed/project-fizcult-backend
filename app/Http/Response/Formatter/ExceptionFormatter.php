<?php

namespace App\Http\Response\Formatter;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ExceptionFormatter
{
    /**
     * @param \Throwable $exception
     * @return JsonResponse
     */
    public function format(\Throwable $exception): JsonResponse
    {
        $result =  [
            'result' => false,
            'error' => $exception->getMessage(),
        ];

        return new JsonResponse($result, Response::HTTP_OK);
    }
}
