<?php

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Returns true if ANY nested checker passes (OR combinator).
 *
 * @sees USES_API(9): CheckerInterface, Update entity
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AnyChecker, OR combinator, checker
// STRUCTURE: ▶ check() → ○ return true

// region CLASS_AnyChecker [DOMAIN(8): Telegram; CONCEPT(7): Checker; TECH(9): PHP]
/**
 * Simple checker that allows any update.
 */
class AnyChecker implements CheckerInterface
{
    /**
     * {@inheritDoc}
     */
    public function check(Update $update): bool
    {
        return true;
    }
}
// endregion CLASS_AnyChecker
