<?php

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Update source contract.
 *
 * @sees USES_API(9): Update entity
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UpdateSourceInterface, update source contract
// STRUCTURE: ▶ getUpdates() → iterable⟅Update⟆

// region INTERFACE_UpdateSourceInterface [DOMAIN(8): Telegram; CONCEPT(7): UpdateSource; TECH(9): PHP]
interface UpdateSourceInterface
{
    /**
     * Return last updates.
     *
     * @return iterable<Update>
     */
    public function getUpdates(): iterable;
}
// endregion INTERFACE_UpdateSourceInterface
