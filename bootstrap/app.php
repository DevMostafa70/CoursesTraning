<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\PoliceMan;
use App\Http\Middleware\SetLocale;
use NunoMaduro\Collision\Adapters\Phpunit\Subscribers\EnsurePrinterIsRegisteredSubscriber;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'PoliceMan'=>PoliceMan::class
        ]);

       // $middleware->append(PoliceMan::class);

       $middleware->web(append:
       [ SetLocale::class

         ]
       );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
