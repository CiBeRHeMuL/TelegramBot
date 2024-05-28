<?php

namespace AndrewGos\TelegramBot\Enum;

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
