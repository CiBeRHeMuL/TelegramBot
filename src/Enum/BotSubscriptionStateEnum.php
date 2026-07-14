<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of bot subscription states in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotSubscriptionStateEnum, bot subscription state, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_BotSubscriptionStateEnum
enum BotSubscriptionStateEnum: string
{
    /** @purpose Subscription is active */
    case Active = 'active';
    /** @purpose Subscription was canceled */
    case Canceled = 'canceled';
    /** @purpose Subscription has expired */
    case Expired = 'expired';
}
// endregion ENUM_BotSubscriptionStateEnum
