<?php

namespace AndrewGos\TelegramBot\Client\UpdateChecker;

use AndrewGos\TelegramBot\Entity\Update;

interface UpdateCheckerInterface
{
    /**
     * Check update before processing
     *
     * @param Update $update
     *
     * @return bool
     */
    public function check(Update $update): bool;
}
