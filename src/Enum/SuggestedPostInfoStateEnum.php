<?php

namespace AndrewGos\TelegramBot\Enum;

enum SuggestedPostInfoStateEnum: string
{
    case Pending = 'pending';
    case Approved = 'approved';
    case Declined = 'declined';
}
