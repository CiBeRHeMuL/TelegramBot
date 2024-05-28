<?php

namespace AndrewGos\TelegramBot\Enum;

enum InlineQueryResultThumbnailMimeTypeEnum: string
{
    case ImageJpeg = 'image/jpeg';
    case ImageGif = 'image/gif';
    case VideoMp4 = 'video/mp4';
}
