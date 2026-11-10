<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputProfilePhotoTypeEnum;

// region CLASS_AbstractInputProfilePhoto
/**
 * This object describes a profile photo to set.
 *
 * @see https://core.telegram.org/bots/api#inputprofilephoto
 */
#[AvailableInheritors([
    InputProfilePhotoStatic::class,
    InputProfilePhotoAnimated::class,
])]
abstract class AbstractInputProfilePhoto implements EntityInterface
{
    public function __construct(
        protected readonly InputProfilePhotoTypeEnum $type,
    ) {}

    public function getType(): InputProfilePhotoTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractInputProfilePhoto
