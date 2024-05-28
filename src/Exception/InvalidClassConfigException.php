<?php

namespace AndrewGos\TelegramBot\Exception;

use Exception;

class InvalidClassConfigException extends Exception
{
    public function __construct(string $class)
    {
        parent::__construct("Invalid config for entity class $class");
    }
}
