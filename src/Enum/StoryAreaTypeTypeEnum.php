<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of story area types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StoryAreaTypeType, story, area, type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_StoryAreaTypeTypeEnum
enum StoryAreaTypeTypeEnum: string
{
    case Location = 'location';
    case SuggestedReaction = 'suggested_reaction';
    case Link = 'link';
    case Weather = 'weather';
    case UniqueGift = 'unique_gift';
}
// endregion ENUM_StoryAreaTypeTypeEnum
