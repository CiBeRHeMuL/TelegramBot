<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents the content of a media message to be sent.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputmedia
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Input media types] => InputMediaVenue, InputMediaSticker, InputMediaLivePhoto, InputMediaLocation, InputMediaAnimation, InputMediaDocument, InputMediaAudio, InputMediaPhoto, InputMediaVideo
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractInputMedia, Telegram Bot API, abstract, input, media, DTO
// STRUCTURE: ▶ ┌type: InputMediaTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractInputMedia [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object represents the content of a media message to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmedia
 */
#[AvailableInheritors([
    InputMediaVenue::class,
    InputMediaSticker::class,
    InputMediaLivePhoto::class,
    InputMediaLocation::class,
    InputMediaAnimation::class,
    InputMediaDocument::class,
    InputMediaAudio::class,
    InputMediaPhoto::class,
    InputMediaVideo::class,
])]
abstract class AbstractInputMedia implements EntityInterface
{
    public function __construct(
        protected readonly InputMediaTypeEnum $type,
    ) {}

    public function getType(): InputMediaTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractInputMedia
