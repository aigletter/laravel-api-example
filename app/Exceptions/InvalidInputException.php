<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class InvalidInputException extends ValidationException
{
    protected $message = 'Validation error';
}
