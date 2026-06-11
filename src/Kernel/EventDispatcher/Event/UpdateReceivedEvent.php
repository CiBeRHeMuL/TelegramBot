<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Entity\Update;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Dispatched when a new update is received.
 *
 * @sees USES_API(9): AbstractEvent, Update entity
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UpdateReceivedEvent, update received event
// STRUCTURE: ▶ ┌Update entity┐ → ⊕ getUpdate()

// region CLASS_UpdateReceivedEvent [DOMAIN(8): Telegram; CONCEPT(7): Event; TECH(9): PHP]
final class UpdateReceivedEvent extends AbstractEvent
{
    public function __construct(
        private readonly Update $update,
    ) {}

    public function getUpdate(): Update
    {
        return $this->update;
    }
}
// endregion CLASS_UpdateReceivedEvent
