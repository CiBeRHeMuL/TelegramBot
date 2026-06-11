<?php

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Entity\Update;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Array-based update source (testing).
 *
 * @sees USES_API(9): Update entity, UpdateSourceInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ArrayUpdateSource, array source, testing
// STRUCTURE: ▶ getUpdates() → ∑ return $this->updates

// region CLASS_ArrayUpdateSource [DOMAIN(8): Telegram; CONCEPT(7): UpdateSource; TECH(9): PHP]
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
