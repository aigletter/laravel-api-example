<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Response;

class ErrorHandler extends Handler
{
    public function register()
    {
        // Other type of exceptions are handled with a function in bootstrap/app.php file
        $this->renderable(function (InvalidInputException $exception) {
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
