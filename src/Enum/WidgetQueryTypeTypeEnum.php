<?php

namespace AndrewGos\TelegramBot\Enum;

enum WidgetQueryTypeTypeEnum: string
{
    case Data = 'data';
    case SignData = 'sign_data';
    case SentTransaction = 'sent_transaction';
}
