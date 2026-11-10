<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

// region INTERFACE_InputPollOptionMediaInterface
/**
 * This object represents the content of a poll option to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputpolloptionmedia
 */
#[AvailableInheritors([
    InputMediaAnimation::class,
    InputMediaLivePhoto::class,
    InputMediaLocation::class,
    InputMediaPhoto::class,
    InputMediaSticker::class,
    InputMediaVenue::class,
    InputMediaVideo::class,
    InputMediaLink::class,
])]
interface InputPollOptionMediaInterface {}

// endregion INTERFACE_InputPollOptionMediaInterface
