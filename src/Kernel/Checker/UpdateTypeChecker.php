<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Checks if update type matches expected enum.
 *
 * @sees USES_API(9): UpdateTypeEnum, Update entity, CheckerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UpdateTypeChecker, update type, enum check
// STRUCTURE: ▶ check() → ◇ $update->getType() === $expectedType → ⊕ bool

// region CLASS_UpdateTypeChecker [DOMAIN(8): Telegram; CONCEPT(7): Checker; TECH(9): PHP]
/**
 * Checks that update have specified type.
 */
readonly class UpdateTypeChecker implements CheckerInterface
{
    public function __construct(
        private UpdateTypeEnum $expectedType,
    ) {}

    public function check(Update $update): bool
    {
        return $update->getType() === $this->expectedType;
    }
}
// endregion CLASS_UpdateTypeChecker
