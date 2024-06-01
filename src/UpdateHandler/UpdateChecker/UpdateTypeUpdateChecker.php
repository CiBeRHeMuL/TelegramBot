<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateChecker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Checks that update have specified type
 */
class UpdateTypeUpdateChecker implements UpdateCheckerInterface
{
    public function __construct(
        private readonly UpdateTypeEnum $expectedType,
    ) {
    }

    public function check(Update $update): bool
    {
        return $update->getType() === $this->expectedType;
    }
}
