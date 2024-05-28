<?php

namespace AndrewGos\TelegramBot\Client;

use AndrewGos\TelegramBot\Client\UpdateChecker\UpdateCheckerInterface;
use AndrewGos\TelegramBot\Client\UpdateProcessor\UpdateProcessorInterface;
use InvalidArgumentException;

readonly class CheckableProcess
{
    /**
     * @param class-string<UpdateProcessorInterface> $processorClass
     * @param UpdateCheckerInterface $checker
     */
    public function __construct(
        private string $processorClass,
        private UpdateCheckerInterface $checker,
    ) {
        if (!class_exists($this->processorClass) || !is_subclass_of($this->processorClass, UpdateProcessorInterface::class)) {
            throw new InvalidArgumentException('Provided processor must implement UpdateProcessorInterface');
        }
    }

    /**
     * @return class-string<UpdateProcessorInterface>
     */
    public function getProcessorClass(): string
    {
        return $this->processorClass;
    }

    public function getChecker(): UpdateCheckerInterface
    {
        return $this->checker;
    }
}
