<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of message origin types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageOriginType, message, origin, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_MessageOriginTypeEnum
enum MessageOriginTypeEnum: string
{
    case User = 'user';
    case HiddenUser = 'hidden_user';
    case Chat = 'chat';
    case Channel = 'channel';
}
// endregion ENUM_MessageOriginTypeEnum
