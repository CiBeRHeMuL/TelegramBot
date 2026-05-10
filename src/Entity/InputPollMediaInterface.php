<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

/**
 * This object represents the content of a poll description or a quiz explanation to be sent.
 * @link https://core.telegram.org/bots/api#inputpollmedia
 */
#[AvailableInheritors([
    InputMediaAnimation::class,
    InputMediaAudio::class,
    InputMediaDocument::class,
    InputMediaLivePhoto::class,
    InputMediaLocation::class,
    InputMediaPhoto::class,
    InputMediaVenue::class,
    InputMediaVideo::class,
])]
interface InputPollMediaInterface {}
