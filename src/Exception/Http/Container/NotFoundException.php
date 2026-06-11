<?php

namespace AndrewGos\TelegramBot\Exception\Http\Container;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Исключение, выбрасываемое при отсутствии HTTP-контейнера.
 *
 * @sees USES_API(X): Psr\Container\NotFoundExceptionInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: NotFoundException, Telegram, exception, HTTP, container, PSR
// STRUCTURE: ▶ ┌call┐ → ✗ \Exception implements NotFoundExceptionInterface
// region CLASS_NotFoundException
class NotFoundException extends Exception implements NotFoundExceptionInterface {}
// endregion CLASS_NotFoundException
