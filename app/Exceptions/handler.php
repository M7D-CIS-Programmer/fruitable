<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    // قائمة الاستثناءات التي يتم تسجيلها أو تجاهلها

    protected $dontReport = [
        // ...
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('pages.404', [], 404);
        }

        return parent::render($request, $exception);
    }
}
