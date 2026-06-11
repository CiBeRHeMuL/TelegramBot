<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of suggested post info states in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SuggestedPostInfoState, suggested, post, info, state, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_SuggestedPostInfoStateEnum
enum SuggestedPostInfoStateEnum: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Declined = 'declined';
}
// endregion ENUM_SuggestedPostInfoStateEnum
