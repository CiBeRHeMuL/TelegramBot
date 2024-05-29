<?php

namespace AndrewGos\TelegramBot\Client\UpdateSource;

use AndrewGos\TelegramBot\Builder\ClassBuilderInterface;
use AndrewGos\TelegramBot\Entity\Update;
use InvalidArgumentException;
use Throwable;

/**
 * Get updates from file. Working with json format
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

    public function getUpdates(): array
    {
        $updatesJson = file_get_contents($this->sourcePath);
        if ($updatesJson !== false) {
            $updates = json_decode($updatesJson, true);
            try {
                return $this->builder->buildArray(Update::class, $updates);
            } catch (Throwable $e) {
                return [];
            }
        }
        return [];
    }
}
