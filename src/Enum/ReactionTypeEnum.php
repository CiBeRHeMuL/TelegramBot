<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of reaction types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ReactionType, reaction, type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_ReactionTypeEnum
enum ReactionTypeEnum: string
{
    case Emoji = 'emoji';
    case CustomEmoji = 'custom_emoji';
    case Paid = 'paid';
}
// endregion ENUM_ReactionTypeEnum
