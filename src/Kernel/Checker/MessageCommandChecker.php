<?php

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

// region CLASS_MessageCommandChecker
/**
 * Checks, that message starts with specified command.
 */
readonly class MessageCommandChecker implements CheckerInterface
{
    public function __construct(
        private string $expectedCommand,
    ) {}

    public function check(Update $update): bool
    {
        if ($update->getType() !== UpdateTypeEnum::Message) {
            return false;
        }

        $text = $update->getMessage()->getText();
        if ($text === null) {
            return false;
        }

        $spacePos = strpos($text, ' ');

        if ($spacePos !== false && substr($text, 0, $spacePos) === "/$this->expectedCommand") {
            return true;
        }

        return $text === "/$this->expectedCommand";
    }
}
// endregion CLASS_MessageCommandChecker
