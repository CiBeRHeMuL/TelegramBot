<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a paid reaction type.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#reactiontypepaid
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ReactionTypePaid, Telegram, Bot API, DTO, reactiontypepaid
// STRUCTURE: ▶ ┌type┐ → ∑ reaction (paid)
// region CLASS_ReactionTypePaid

/**
 * The reaction is paid.
 *
 * @see https://core.telegram.org/bots/api#reactiontypepaid
 */
#[BuildIf(new FieldIsChecker('type', ReactionTypeEnum::Paid->value))]
final class ReactionTypePaid extends AbstractReactionType
{
    public function __construct()
    {
        parent::__construct(ReactionTypeEnum::Paid);
    }
}

// endregion CLASS_ReactionTypePaid
