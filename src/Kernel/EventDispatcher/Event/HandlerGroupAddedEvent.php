<?php

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\HandlerGroup;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Dispatched when a handler group is added.
 *
 * @sees USES_API(9): AbstractEvent, HandlerGroup
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HandlerGroupAddedEvent, handler group event
// STRUCTURE: ▶ ┌HandlerGroup entity┐ → ⊕ getGroup()

// region CLASS_HandlerGroupAddedEvent [DOMAIN(8): Telegram; CONCEPT(7): Event; TECH(9): PHP]
final class HandlerGroupAddedEvent extends AbstractEvent
{
    public function __construct(
        private readonly HandlerGroup $group,
    ) {}

    public function getGroup(): HandlerGroup
    {
        return $this->group;
    }
}
// endregion CLASS_HandlerGroupAddedEvent
