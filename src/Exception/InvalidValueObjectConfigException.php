<?php

namespace AndrewGos\TelegramBot\Exception;

use Exception;

class InvalidValueObjectConfigException extends Exception
{
    public function __construct(string $class, string $error)
    {
        $message = "Invalid config for ValueObject $class: $error";
        parent::__construct($message);
    }
}
