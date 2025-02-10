<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ErrorHandler extends Handler
{
    public function register()
    {
        $this->renderable(function (ValidationException $exception) {
            $messages = $exception->validator->errors()->messages();
            return new Response([
                'message' => $exception->getMessage(),
                'errors' => array_map(
                    function ($error, $key) {
                        return [
                            'name' => $key,
                            'text' => implode(' ', $error),
                        ];
                    },
                    $messages,
                    array_keys($messages)
                ),
            ], 422);
        });
    }
}
