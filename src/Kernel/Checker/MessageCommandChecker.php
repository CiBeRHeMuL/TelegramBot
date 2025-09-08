<?php

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Checks, that message starts with specified command
 */
readonly class MessageCommandChecker implements CheckerInterface
{
    public function __construct(
        private string $expectedCommand,
    ) {
    }

    public function check(Update $update): bool
    {
        return $update->getType() === UpdateTypeEnum::Message
            && (
                substr(
                    $update->getMessage()->getText(),
                    0,
                    strpos($update->getMessage()->getText(), ' '),
                ) === "/$this->expectedCommand"
                || $update->getMessage()->getText() === "/$this->expectedCommand"
            );
    }
}
