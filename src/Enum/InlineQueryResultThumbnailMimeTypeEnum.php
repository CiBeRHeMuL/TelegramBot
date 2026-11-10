<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_InlineQueryResultThumbnailMimeTypeEnum
enum InlineQueryResultThumbnailMimeTypeEnum: string
{
    case ImageJpeg = 'image/jpeg';
    case ImageGif = 'image/gif';
    case VideoMp4 = 'video/mp4';
}
// endregion ENUM_InlineQueryResultThumbnailMimeTypeEnum
