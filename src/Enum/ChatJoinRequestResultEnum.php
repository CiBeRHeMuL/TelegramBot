<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_ChatJoinRequestResultEnum
/**
 * Enumeration of Chat Join Request Result types in Telegram Bot API.
 *
 * @see AnswerChatJoinRequestQueryRequest
 */
enum ChatJoinRequestResultEnum: string
{
    /** Allow the user to join the chat */
    case Approve = 'approve';
    /** Disallow the user to join the chat */
    case Decline = 'decline';
    /** Leave the decision to other administrators */
    case Queue = 'queue';
}
// endregion ENUM_ChatJoinRequestResultEnum
