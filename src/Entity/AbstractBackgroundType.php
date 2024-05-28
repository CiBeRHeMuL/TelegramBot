<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\AvailableExtensions;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;

/**
 * This object describes the type of a background.
 * @link https://core.telegram.org/bots/api#backgroundtype
 */
#[AvailableExtensions([
    BackgroundTypeFill::class,
    BackgroundTypeWallpaper::class,
    BackgroundTypePattern::class,
    BackgroundTypeChatTheme::class,
])]
abstract class AbstractBackgroundType implements EntityInterface
{
    public function __construct(
        protected readonly BackgroundTypeTypeEnum $type,
    ) {
    }

    public function getType(): BackgroundTypeTypeEnum
    {
        return $this->type;
    }
}
