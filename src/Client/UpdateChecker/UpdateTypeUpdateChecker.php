<?php

namespace AndrewGos\TelegramBot\Client\UpdateChecker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Checks that update have specified type
 */
class UpdateTypeUpdateChecker extends AbstractUpdateChecker
{
    public function __construct(
        private readonly UpdateTypeEnum $expectedType,
    ) {
    }

    public function check(Update $update): bool
    {
        return $this->getUpdateType($update) === $this->expectedType;
    }
}
