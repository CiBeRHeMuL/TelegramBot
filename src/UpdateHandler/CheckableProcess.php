<?php

namespace AndrewGos\TelegramBot\UpdateHandler;

use AndrewGos\TelegramBot\UpdateHandler\UpdateChecker\UpdateCheckerInterface;
use AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\UpdateProcessorInterface;

readonly class CheckableProcess
{
    /**
     * @param UpdateProcessorInterface $processor
     * @param UpdateCheckerInterface $checker
     */
    public function __construct(
        private UpdateProcessorInterface $processor,
        private UpdateCheckerInterface $checker,
    ) {
    }

    /**
     * @return UpdateProcessorInterface
     */
    public function getProcessor(): UpdateProcessorInterface
    {
        return $this->processor;
    }

    public function getChecker(): UpdateCheckerInterface
    {
        return $this->checker;
    }
}
