<?php

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;

interface UpdateSourceInterface
{
    /**
     * Return last updates
     *
     * @return iterable<Update>
     */
    public function getUpdates(): iterable;
}
