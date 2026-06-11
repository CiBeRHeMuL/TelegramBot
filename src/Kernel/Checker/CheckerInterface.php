<?php

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Checker contract — check if handler should process update.
 *
 * @sees USES_API(9): Update entity
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: CheckerInterface, checker contract, update filtering
// STRUCTURE: ▶ check(Update $update) → bool

// region INTERFACE_CheckerInterface [DOMAIN(8): Telegram; CONCEPT(7): Checker; TECH(9): PHP]
interface CheckerInterface
{
    /**
     * Checks the update for compliance with the conditions.
     *
     * @param Update $update
     *
     * @return bool
     */
    public function check(Update $update): bool;
}
// endregion INTERFACE_CheckerInterface
