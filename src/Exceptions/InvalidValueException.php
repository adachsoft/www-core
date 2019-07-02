<?php

namespace App\Exceptions;

/**
* Class 
*/
class InvalidValueException extends \Exception
{
    public function __construct(string $message="Invalid value", int $code=0, \Throwable $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
    }
}