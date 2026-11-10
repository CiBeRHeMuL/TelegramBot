<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputPaidMediaTypeEnum;

// region CLASS_AbstractInputPaidMedia
#[AvailableInheritors([
    InputPaidMediaLivePhoto::class,
    InputPaidMediaPhoto::class,
    InputPaidMediaVideo::class,
])]
abstract class AbstractInputPaidMedia implements EntityInterface
{
    /**
     * @param InputPaidMediaTypeEnum $type
     */
    public function __construct(
        protected readonly InputPaidMediaTypeEnum $type,
    ) {}

    public function getType(): InputPaidMediaTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractInputPaidMedia
