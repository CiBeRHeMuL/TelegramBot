<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_UniqueGiftInfoOriginEnum
enum UniqueGiftInfoOriginEnum: string
{
    case Upgrade = 'upgrade';
    case Transfer = 'transfer';
    case Resale = 'resale';
}
// endregion ENUM_UniqueGiftInfoOriginEnum
