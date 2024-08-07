<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;

/**
 * This object represents the content of a media message to be sent.
 * @link https://core.telegram.org/bots/api#inputmedia
 */
#[AvailableInheritors([
    InputMediaAnimation::class,
    InputMediaDocument::class,
    InputMediaAudio::class,
    InputMediaPhoto::class,
    InputMediaVideo::class,
])]
abstract class AbstractInputMedia extends AbstractEntity
{
    public function __construct(
        protected readonly InputMediaTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): InputMediaTypeEnum
    {
        return $this->type;
    }
}
