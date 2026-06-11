<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\ClassBuilder\ClassBuilderInterface;
use AndrewGos\TelegramBot\Entity\Update;
use InvalidArgumentException;
use Throwable;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Custom callable update source — reads JSON from a file/stream.
 *
 * @sees USES_API(9): UpdateSourceInterface, ClassBuilderInterface, Update entity
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: CustomInputUpdateSource, custom source, JSON input
// STRUCTURE: ▶ __construct() → ○ fopen(source) → ◇ false ? throw | fclose()   ▶ getUpdates() → ○ file_get_contents() → ○ json_decode() → ◇ array_is_list ? → ⊕ buildArray() → ⊕ yield

// region CLASS_CustomInputUpdateSource [DOMAIN(8): Telegram; CONCEPT(7): UpdateSource; TECH(9): PHP]
/**
 * Get updates from a file. Working with JSON format.
 */
class CustomInputUpdateSource implements UpdateSourceInterface
{
    public function __construct(
        protected string $sourcePath,
        protected ClassBuilderInterface $builder,
    ) {
        $source = fopen($this->sourcePath, 'rb');
        if ($source === false) {
            throw new InvalidArgumentException('Invalid source! Source could not be opened.');
        }
        fclose($source);
    }

    public function getUpdates(): iterable
    {
        $updatesJson = file_get_contents($this->sourcePath);
        if ($updatesJson !== false) {
            $updates = json_decode($updatesJson, true);
            try {
                if (!array_is_list($updates)) {
                    $updates = [$updates];
                }
                yield from $this->builder->buildArray(Update::class, $updates);
            } catch (Throwable) {
                yield from [];
            }
        }
        yield from [];
    }
}
// endregion CLASS_CustomInputUpdateSource
