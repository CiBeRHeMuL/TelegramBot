<?php

namespace AndrewGos\TelegramBot\UpdateHandler;

use AndrewGos\TelegramBot\UpdateHandler\UpdateChecker\UpdateCheckerInterface;
use AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\UpdateProcessorInterface;
use InvalidArgumentException;

readonly class CheckableProcess
{
    /**
     * @param class-string<UpdateProcessorInterface> $processorClass
     * @param UpdateCheckerInterface $checker
     * @param array $extraParameters parameters for update processor
     */
    public function __construct(
        private string $processorClass,
        private UpdateCheckerInterface $checker,
        private array $extraParameters = [],
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

    public function getExtraParameters(): array
    {
        return $this->extraParameters;
    }
}
