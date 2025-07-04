<?php

namespace AndrewGos\TelegramBot\Enum;

enum UniqueGiftInfoOriginEnum: string
{
    case Upgrade = 'upgrade';
    case Transfer = 'transfer';
    case Resale = 'resale';
}

