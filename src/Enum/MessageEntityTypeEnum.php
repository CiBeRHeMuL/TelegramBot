<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of message entity types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageEntityType, message, entity, type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_MessageEntityTypeEnum
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
    case ExpandableBlockquote = 'expandable_blockquote';
    case DateTime = 'date_time';
}
// endregion ENUM_MessageEntityTypeEnum
