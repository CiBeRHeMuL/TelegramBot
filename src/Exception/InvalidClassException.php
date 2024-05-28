<?php

namespace AndrewGos\TelegramBot\Exception;

use Exception;

class InvalidClassException extends Exception
{
    public function __construct(string $entityClass)
    {
        parent::__construct("Invalid entity class $entityClass");
    }
}
