<?php

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;

interface CheckerInterface
{
    /**
     * Checks the update for compliance with the conditions
     *
     * @param Update $update
     *
     * @return bool
     */
    public function check(Update $update): bool;
}
