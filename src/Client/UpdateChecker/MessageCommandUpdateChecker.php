<?php

namespace AndrewGos\TelegramBot\Client\UpdateChecker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Checks, that message starts with specified command
 */
class MessageCommandUpdateChecker extends AbstractUpdateChecker
{
    public function __construct(
        private readonly string $expectedCommand,
    ) {
    }

    public function check(Update $update): bool
    {
        return $this->getUpdateType($update) === UpdateTypeEnum::Message
            && str_starts_with($update->getMessage()->getText(), "/$this->expectedCommand");
    }
}
