<?php

namespace App\Handlers;

use Exception;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\Handlers\IExceptionHandler;

class CustomExceptionHandler implements IExceptionHandler
{
    /**
    * @param Request $request
    * @param Exception $error
    * @throws Exception
    */
    public function handleError(Request $request, Exception $error): void
    {

        if ($request->getUrl()->contains('/api')) {

            response()->json([
                'error' => $error->getMessage(),
                'code'  => $error->getCode(),
            ]);
            var_dump('sadfasdfasdfasdfasd');
        }

        if ($error instanceof NotFoundHttpException) {
            return;
        }

        throw $error;
    }
}
