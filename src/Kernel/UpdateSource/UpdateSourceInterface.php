<?php

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;

// region INTERFACE_UpdateSourceInterface
interface UpdateSourceInterface
{
    /**
     * Return last updates.
     *
     * @return iterable<Update>
     */
    public function getUpdates(): iterable;
}
// endregion INTERFACE_UpdateSourceInterface
