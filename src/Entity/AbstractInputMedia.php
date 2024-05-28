<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\AvailableExtensions;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;

/**
 * This object represents the content of a media message to be sent.
 * @link https://core.telegram.org/bots/api#inputmedia
 */
#[AvailableExtensions([
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
    ) {
    }

    public function getType(): InputMediaTypeEnum
    {
        return $this->type;
    }
}
