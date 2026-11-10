<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\WidgetQueryTypeTypeEnum;

// region CLASS_AbstractWidgetQueryType
#[AvailableInheritors([
    WidgetQueryTypeSentTransaction::class,
    WidgetQueryTypeSignData::class,
    WidgetQueryTypeData::class,
    WidgetQueryTypeData::class,
    WidgetQueryTypeSignData::class,
    WidgetQueryTypeSentTransaction::class,
])]
abstract class AbstractWidgetQueryType implements EntityInterface
{
    public function __construct(
        protected readonly WidgetQueryTypeTypeEnum $type,
    ) {}

    public function getType(): WidgetQueryTypeTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractWidgetQueryType
