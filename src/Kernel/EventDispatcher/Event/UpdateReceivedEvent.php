<?php

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Entity\Update;

final class UpdateReceivedEvent extends AbstractEvent
{
    public function __construct(
        private readonly Update $update,
    ) {
    }

    public function getUpdate(): Update
    {
        return $this->update;
    }
}
