<?php

namespace AndrewGos\TelegramBot\Enum;

enum StoryAreaTypeTypeEnum: string
{
    case Location = 'location';
    case SuggestedReaction = 'suggested_reaction';
    case Link = 'link';
    case Weather = 'weather';
    case UniqueGift = 'unique_gift';
}

