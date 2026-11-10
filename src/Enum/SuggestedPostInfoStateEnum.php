<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_SuggestedPostInfoStateEnum
enum SuggestedPostInfoStateEnum: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Declined = 'declined';
}
// endregion ENUM_SuggestedPostInfoStateEnum
