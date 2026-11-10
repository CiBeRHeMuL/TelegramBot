<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_SuggestedPostInfoStateEnum
enum SuggestedPostInfoStateEnum: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Declined = 'declined';
}
// endregion ENUM_SuggestedPostInfoStateEnum
