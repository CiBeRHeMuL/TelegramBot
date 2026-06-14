<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of Chat Join Request Result types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatJoinRequestResultEnum, Chat Join Request Result, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_ChatJoinRequestResultEnum
/**
 * Enumeration of Chat Join Request Result types in Telegram Bot API.
 *
 * @see AnswerChatJoinRequestQueryRequest
 */
enum ChatJoinRequestResultEnum: string
{
    /** @purpose Allow the user to join the chat */
    case Approve = 'approve';
    /** @purpose Disallow the user to join the chat */
    case Decline = 'decline';
    /** @purpose Leave the decision to other administrators */
    case Queue = 'queue';
}
// endregion ENUM_ChatJoinRequestResultEnum
