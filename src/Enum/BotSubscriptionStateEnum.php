<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_BotSubscriptionStateEnum
enum BotSubscriptionStateEnum: string
{
    /** Subscription is active */
    case Active = 'active';
    /** Subscription was canceled */
    case Canceled = 'canceled';
    /** Subscription has expired */
    case Expired = 'expired';
}
// endregion ENUM_BotSubscriptionStateEnum
