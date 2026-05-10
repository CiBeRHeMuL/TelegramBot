<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

/**
 * This object represents the content of a poll option to be sent.
 * @link https://core.telegram.org/bots/api#inputpolloptionmedia
 */
#[AvailableInheritors([
    InputMediaAnimation::class,
    InputMediaLivePhoto::class,
    InputMediaLocation::class,
    InputMediaPhoto::class,
    InputMediaSticker::class,
    InputMediaVenue::class,
    InputMediaVideo::class,
])]
interface InputPollOptionMediaInterface {}
