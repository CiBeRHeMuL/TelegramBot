<?php

namespace AndrewGos\TelegramBot\Enum;

enum MessageOriginTypeEnum: string
{
    case User = 'user';
    case HiddenUser = 'hidden_user';
    case Chat = 'chat';
    case Channel = 'channel';
}
