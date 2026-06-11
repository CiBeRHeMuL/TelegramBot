<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

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
])]
// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Marker interface for input media types that can be used as poll option media.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputpolloptionmedia
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputPollOptionMediaInterface, Telegram, Bot API, DTO, inputpolloptionmedia
// STRUCTURE: ▶ ┌interface┐ → ∅ (marker only)
// region INTERFACE_InputPollOptionMediaInterface
interface InputPollOptionMediaInterface {}

// endregion INTERFACE_InputPollOptionMediaInterface
