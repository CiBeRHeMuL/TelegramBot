<?php

namespace AndrewGos\TelegramBot\Exception\Container;

use LogicException;
use Psr\Container\NotFoundExceptionInterface;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Исключение, выбрасываемое при отсутствии атрибута в контейнере.
 *
 * @sees USES_API(X): Psr\Container\NotFoundExceptionInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AttributeNotFoundException, Telegram, exception, container, attribute, PSR
// STRUCTURE: ▶ ┌call┐ → ✗ \LogicException implements NotFoundExceptionInterface
// region CLASS_AttributeNotFoundException
class AttributeNotFoundException extends LogicException implements NotFoundExceptionInterface {}
// endregion CLASS_AttributeNotFoundException
