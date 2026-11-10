<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;

// region CLASS_AnyChecker
/**
 * Simple checker that allows any update.
 */
class AnyChecker implements CheckerInterface
{
    /**
     * {@inheritDoc}
     */
    public function check(Update $update): bool
    {
        return true;
    }
}
// endregion CLASS_AnyChecker
