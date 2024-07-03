<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputPaidMediaTypeEnum;

#[AvailableInheritors([
    InputPaidMediaPhoto::class,
    InputPaidMediaVideo::class,
])]
abstract class AbstractInputPaidMedia extends AbstractEntity
{
    /**
     * @param InputPaidMediaTypeEnum $type
     */
    public function __construct(
        protected readonly InputPaidMediaTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): InputPaidMediaTypeEnum
    {
        return $this->type;
    }
}
