<?php

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Checks if message contains specific bot command.
 *
 * @sees USES_API(9): UpdateTypeEnum, Update entity, CheckerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageCommandChecker, bot command, message check
// STRUCTURE: ▶ check() → ◇ $update->getType() === Message → ◇ text === /command → ⊕ bool

// region CLASS_MessageCommandChecker [DOMAIN(8): Telegram; CONCEPT(7): Checker; TECH(9): PHP]
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
// endregion CLASS_MessageCommandChecker
