<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of mask position types for sticker masks in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MaskPosition, mask, position, sticker, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_MaskPositionEnum
enum MaskPositionEnum: string
{
    case Forehead = 'forehead';
    case Eyes = 'eyes';
    case Mouth = 'mouth';
    case Chin = 'chin';
}
// endregion ENUM_MaskPositionEnum
