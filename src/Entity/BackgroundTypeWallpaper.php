<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;
use stdClass;

/**
 * The background is a wallpaper in the JPEG format.
 * @link https://core.telegram.org/bots/api#backgroundtypewallpaper
 */
#[BuildIf(new FieldIsChecker('type', BackgroundTypeTypeEnum::Wallpaper->value))]
class BackgroundTypeWallpaper extends AbstractBackgroundType
{
    /**
     * @param Document $document Document with the wallpaper
     * @param int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
     * @param bool|null $is_blurred Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred
     * with radius 12
     * @param bool|null $is_moving Optional. True, if the background moves slightly when the device is tilted
     */
    public function __construct(
        private Document $document,
        private int $dark_theme_dimming,
        private bool|null $is_blurred = null,
        private bool|null $is_moving = null,
    ) {
        parent::__construct(BackgroundTypeTypeEnum::Wallpaper);
    }

    public function getDocument(): Document
    {
        return $this->document;
    }

    public function setDocument(Document $document): BackgroundTypeWallpaper
    {
        $this->document = $document;
        return $this;
    }

    public function getDarkThemeDimming(): int
    {
        return $this->dark_theme_dimming;
    }

    public function setDarkThemeDimming(int $dark_theme_dimming): BackgroundTypeWallpaper
    {
        $this->dark_theme_dimming = $dark_theme_dimming;
        return $this;
    }

    public function getIsBlurred(): bool|null
    {
        return $this->is_blurred;
    }

    public function setIsBlurred(bool|null $is_blurred): BackgroundTypeWallpaper
    {
        $this->is_blurred = $is_blurred;
        return $this;
    }

    public function getIsMoving(): bool|null
    {
        return $this->is_moving;
    }

    public function setIsMoving(bool|null $is_moving): BackgroundTypeWallpaper
    {
        $this->is_moving = $is_moving;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'document' => $this->document->toArray(),
            'dark_theme_dimming' => $this->dark_theme_dimming,
            'is_blurred' => $this->is_blurred,
            'is_moving' => $this->is_moving,
        ];
    }
}
