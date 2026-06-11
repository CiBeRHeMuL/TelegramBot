<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

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
// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Marker interface for input media types that can be used in polls.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputpollmedia
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputPollMediaInterface, Telegram, Bot API, DTO, inputpollmedia
// STRUCTURE: ▶ ┌interface┐ → ∅ (marker only)
// region INTERFACE_InputPollMediaInterface
interface InputPollMediaInterface {}

// endregion INTERFACE_InputPollMediaInterface
