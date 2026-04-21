<?php

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;

readonly class ArrayUpdateSource implements UpdateSourceInterface
{
    /**
     * @param Update[] $updates
     */
    public function __construct(
        private array $updates,
    ) {}

    /**
     * @inheritDoc
     */
    public function getUpdates(): iterable
    {
        return $this->updates;
    }
}
