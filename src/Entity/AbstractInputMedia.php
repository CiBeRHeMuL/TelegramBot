<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;

// region CLASS_AbstractInputMedia
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
    InputMediaVoiceNote::class,
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
