<?php

namespace AndrewGos\TelegramBot\Enum;

enum InlineQueryResultTypeEnum: string
{
    case Article = 'article';
    case Audio = 'audio';
    case Contact = 'contact';
    case Game = 'game';
    case Document = 'document';
    case Gif = 'gif';
    case Location = 'location';
    case Mpeg4Gif = 'mpeg4_gif';
    case Photo = 'photo';
    case Venue = 'venue';
    case Video = 'video';
    case Voice = 'voice';
    case Sticker = 'sticker';
}
