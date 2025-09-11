<?php

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;

/**
 * Simple checker that allows any update
 */
class AnyChecker implements CheckerInterface
{
    /**
     * @inheritDoc
     */
    public function check(Update $update): bool
    {
        return true;
    }
}
