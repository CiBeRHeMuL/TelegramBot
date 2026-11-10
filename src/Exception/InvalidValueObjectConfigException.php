<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Exception;

use Exception;

// region CLASS_InvalidValueObjectConfigException
class InvalidValueObjectConfigException extends Exception
{
    public function __construct(string $class, string $error)
    {
        $message = "Invalid config for ValueObject $class: $error";
        parent::__construct($message);
    }
}
// endregion CLASS_InvalidValueObjectConfigException
