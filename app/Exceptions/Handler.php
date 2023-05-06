<?php

namespace App\Exceptions;

use App\Http\Response\Formatter\ExceptionFormatter;
use App\Services\Exception\AbstractApplicationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    public function __construct(private ExceptionFormatter $exceptionFormatter)
    {
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if ($exception instanceof AbstractApplicationException) {
            return;
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AbstractApplicationException) {
            return $this->exceptionFormatter->format($exception);
        }

        return new JsonResponse([
            'error' => $exception->getMessage(),
            'result' => false
        ], $this->getCode($exception));

//        return parent::render($request, $exception);
    }

    private function getCode(Throwable $exception): int
    {
        if ($exception instanceof ValidationException) {
            return Response::HTTP_BAD_REQUEST;
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return Response::HTTP_METHOD_NOT_ALLOWED;
        }

        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
