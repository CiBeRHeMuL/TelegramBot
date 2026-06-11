<?php

namespace AndrewGos\TelegramBot\Exception;

use Exception;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Исключение, выбрасываемое при неверной конфигурации Value Object (ошибка валидации).
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InvalidValueObjectConfigException, Telegram, exception, value object, validation
// STRUCTURE: ▶ ┌class, error┐ → ○ format message → ○ parent::__construct()
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
