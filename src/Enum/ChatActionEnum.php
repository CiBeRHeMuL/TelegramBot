<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of chat actions (typing, upload photo, etc.) in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatAction, chat, action, typing, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_ChatActionEnum
enum ChatActionEnum: string
{
    case Typing = 'typing';
    case UploadPhoto = 'upload_photo';
    case RecordVideo = 'record_video';
    case RecordVoice = 'record_voice';
    case UploadDocument = 'upload_document';
    case ChooseSticker = 'choose_sticker';
    case FindLocation = 'find_location';
    case RecordVideoNote = 'record_video_note';
}
// endregion ENUM_ChatActionEnum
