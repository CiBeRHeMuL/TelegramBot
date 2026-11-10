<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_MessageOriginTypeEnum
enum MessageOriginTypeEnum: string
{
    case User = 'user';
    case HiddenUser = 'hidden_user';
    case Chat = 'chat';
    case Channel = 'channel';
}
// endregion ENUM_MessageOriginTypeEnum
