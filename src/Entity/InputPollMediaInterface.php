<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

// region INTERFACE_InputPollMediaInterface
/**
 * This object represents the content of a poll description or a quiz explanation to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputpollmedia
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

// endregion INTERFACE_InputPollMediaInterface
