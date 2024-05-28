<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;

interface UpdateSourceInterface
{
    /**
     * Return last updates
     * @return Update[]
     */
    public function getUpdates(): array;
}
