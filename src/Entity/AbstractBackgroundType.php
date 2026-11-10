<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;

// region CLASS_AbstractBackgroundType
/**
 * This object describes the type of a background.
 *
 * @see https://core.telegram.org/bots/api#backgroundtype
 */
#[AvailableInheritors([
    BackgroundTypeFill::class,
    BackgroundTypeWallpaper::class,
    BackgroundTypePattern::class,
    BackgroundTypeChatTheme::class,
])]
abstract class AbstractBackgroundType implements EntityInterface
{
    public function __construct(
        protected readonly BackgroundTypeTypeEnum $type,
    ) {}

    public function getType(): BackgroundTypeTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractBackgroundType
