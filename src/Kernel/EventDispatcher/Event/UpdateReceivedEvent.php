<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Entity\Update;

// region CLASS_UpdateReceivedEvent
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
