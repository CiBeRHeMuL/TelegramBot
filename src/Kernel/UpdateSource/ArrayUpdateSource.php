<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;

// region CLASS_ArrayUpdateSource
readonly class ArrayUpdateSource implements UpdateSourceInterface
{
    /**
     * @param Update[] $updates
     */
    public function __construct(
        private array $updates,
    ) {}

    /**
     * {@inheritDoc}
     */
    public function getUpdates(): iterable
    {
        return $this->updates;
    }
}
// endregion CLASS_ArrayUpdateSource
