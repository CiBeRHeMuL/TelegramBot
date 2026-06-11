<?php

namespace AndrewGos\TelegramBot\Exception\Filesystem;

use Exception;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Исключение, выбрасываемое при ошибке прав доступа к файловой системе.
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PermissionException, Telegram, exception, filesystem, permission
// STRUCTURE: ▶ ┌call┐ → ✗ \Exception
// region CLASS_PermissionException
class PermissionException extends Exception {}
// endregion CLASS_PermissionException
