<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens( $except = [
            '/success',
            '/cancel',
            '/fail',
            '/ipn',
            '/pay-via-ajax', // only required to run example codes. Please see bellow.
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();