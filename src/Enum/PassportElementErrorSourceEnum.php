<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of passport element error sources in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PassportElementErrorSource, passport, error, source, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_PassportElementErrorSourceEnum
enum PassportElementErrorSourceEnum: string
{
    case Data = 'data';
    case FrontSide = 'front_side';
    case ReverseSide = 'reverse_side';
    case Selfie = 'selfie';
    case File = 'file';
    case Files = 'files';
    case TranslationFile = 'translation_file';
    case TranslationFiles = 'translation_files';
    case Unspecified = 'unspecified';
}
// endregion ENUM_PassportElementErrorSourceEnum
