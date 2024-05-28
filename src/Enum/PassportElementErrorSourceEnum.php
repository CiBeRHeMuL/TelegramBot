<?php

namespace AndrewGos\TelegramBot\Enum;

enum PassportElementErrorSourceEnum: string
{
    case Data = 'data';
    case FrontSide = 'front_side';
    case ReverseSide = 'reverse_side';
    case Selfie = 'selfie';
    case File = 'file';
    case Files = 'files';
    case TranslationFile = 'translation_file';
    case TranslationFiles = 'translation_files';
    case Unspecified = 'unspecified';
}
