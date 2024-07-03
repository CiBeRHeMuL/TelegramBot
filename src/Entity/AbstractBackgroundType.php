<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;

/**
 * This object describes the type of a background.
 * @link https://core.telegram.org/bots/api#backgroundtype
 */
#[AvailableInheritors([
    BackgroundTypeFill::class,
    BackgroundTypeWallpaper::class,
    BackgroundTypePattern::class,
    BackgroundTypeChatTheme::class,
])]
abstract class AbstractBackgroundType extends AbstractEntity
{
    public function __construct(
        protected readonly BackgroundTypeTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): BackgroundTypeTypeEnum
    {
        return $this->type;
    }
}
