<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of input story content types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputStoryContentType, input, story, content, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_InputStoryContentTypeEnum
enum InputStoryContentTypeEnum: string
{
    case Photo = 'photo';
    case Video = 'video';
}
// endregion ENUM_InputStoryContentTypeEnum
