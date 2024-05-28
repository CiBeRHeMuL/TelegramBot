<?php

namespace AndrewGos\TelegramBot\Client\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;

interface UpdateSourceInterface
{
    /**
     * Return last updates
     * @return Update[]
     */
    public function getUpdates(): array;
}
