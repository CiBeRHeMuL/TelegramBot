<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputProfilePhotoTypeEnum;

/**
 * This object describes a profile photo to set.
 * @link https://core.telegram.org/bots/api#inputprofilephoto
 */
#[AvailableInheritors([
    InputProfilePhotoStatic::class,
    InputProfilePhotoAnimated::class,
])]
abstract class AbstractInputProfilePhoto extends AbstractEntity
{
    public function __construct(
        protected readonly InputProfilePhotoTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): InputProfilePhotoTypeEnum
    {
        return $this->type;
    }
}
