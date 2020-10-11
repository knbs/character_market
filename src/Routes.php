<?php

use App\Handlers\CustomExceptionHandler;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(
    ['namespace' => '\App\Controllers', 'exceptionHandler' => CustomExceptionHandler::class],
    function () {
        SimpleRouter::get('/foo', function () {
            return 'foo';
        });

        SimpleRouter::get('/foo-bar', function () {
            return 'foo-bar';
        });
    }
);
