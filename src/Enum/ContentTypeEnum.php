<?php

namespace AndrewGos\TelegramBot\Enum;

enum ContentTypeEnum: string
{
    case ApplicationJson = 'application/json';
    case ApplicationXml = 'application/xml';
    case ApplicationFormUrlencoded = 'application/x-www-form-urlencoded';
    case MultipartFormData = 'multipart/form-data';
}
