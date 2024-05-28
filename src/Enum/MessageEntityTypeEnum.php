<?php

namespace AndrewGos\TelegramBot\Enum;

enum MessageEntityTypeEnum: string
{
    case Mention = 'mention';
    case Hashtag = 'hashtag';
    case Cashtag = 'cashtag';
    case BotCommand = 'bot_command';
    case Url = 'url';
    case Email = 'email';
    case PhoneNumber = 'phone_number';
    case Bold = 'bold';
    case Italic = 'italic';
    case Underline = 'underline';
    case Strikethrough = 'strikethrough';
    case Spoiler = 'spoiler';
    case Blockquote = 'blockquote';
    case Code = 'code';
    case Pre = 'pre';
    case TextLink = 'text_link';
    case TextMention = 'text_mention';
    case CustomEmoji = 'custom_emoji';
}
