<?php

namespace AndrewGos\TelegramBot\Tests\Integration\TestClass\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Kernel\UpdateSource\UpdateSourceInterface;

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
