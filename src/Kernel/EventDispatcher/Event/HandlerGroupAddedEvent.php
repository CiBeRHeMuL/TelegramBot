<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\HandlerGroup;

// region CLASS_HandlerGroupAddedEvent
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
