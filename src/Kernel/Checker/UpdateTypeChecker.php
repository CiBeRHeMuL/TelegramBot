<?php

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

// region CLASS_UpdateTypeChecker
/**
 * Checks that update have specified type.
 */
readonly class UpdateTypeChecker implements CheckerInterface
{
    public function __construct(
        private UpdateTypeEnum $expectedType,
    ) {}

    public function check(Update $update): bool
    {
        return $update->getType() === $this->expectedType;
    }
}
// endregion CLASS_UpdateTypeChecker
