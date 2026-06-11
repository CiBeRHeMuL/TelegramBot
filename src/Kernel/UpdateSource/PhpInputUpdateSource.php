<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\ClassBuilder\ClassBuilderInterface;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Reads from php://input (webhook mode).
 *
 * @sees USES_API(9): CustomInputUpdateSource, ClassBuilderInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PhpInputUpdateSource, php input, webhook update source
// STRUCTURE: ▶ __construct() → ○ parent::__construct('php://input')

// region CLASS_PhpInputUpdateSource [DOMAIN(8): Telegram; CONCEPT(7): UpdateSource; TECH(9): PHP]
/**
 * Get updates from php input.
 */
class PhpInputUpdateSource extends CustomInputUpdateSource
{
    public function __construct(ClassBuilderInterface $builder)
    {
        parent::__construct('php://input', $builder);
    }
}
// endregion CLASS_PhpInputUpdateSource
