<?php

namespace AndrewGos\TelegramBot\Exception\ClassBuilder;

use Exception;

class InvalidClassException extends Exception
{
    public function __construct(string $entityClass)
    {
        parent::__construct("Invalid class '$entityClass'");
    }
}
