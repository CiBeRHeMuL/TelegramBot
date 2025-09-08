<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;

/**
 * The background is a wallpaper in the JPEG format.
 *
 * @link https://core.telegram.org/bots/api#backgroundtypewallpaper
 */
#[BuildIf(new FieldIsChecker('type', BackgroundTypeTypeEnum::Wallpaper->value))]
final class BackgroundTypeWallpaper extends AbstractBackgroundType
{
    /**
     * @param Document $document Document with the wallpaper
     * @param int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
     * @param bool|null $is_blurred Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred
     * with radius 12
     * @param bool|null $is_moving Optional. True, if the background moves slightly when the device is tilted
     *
     * @see https://core.telegram.org/bots/api#document Document
     */
    public function __construct(
        protected Document $document,
        protected int $dark_theme_dimming,
        protected ?bool $is_blurred = null,
        protected ?bool $is_moving = null,
    ) {
        parent::__construct(BackgroundTypeTypeEnum::Wallpaper);
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * @param Document $document
     *
     * @return BackgroundTypeWallpaper
     */
    public function setDocument(Document $document): BackgroundTypeWallpaper
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return int
     */
    public function getDarkThemeDimming(): int
    {
        return $this->dark_theme_dimming;
    }

    /**
     * @param int $dark_theme_dimming
     *
     * @return BackgroundTypeWallpaper
     */
    public function setDarkThemeDimming(int $dark_theme_dimming): BackgroundTypeWallpaper
    {
        $this->dark_theme_dimming = $dark_theme_dimming;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsBlurred(): ?bool
    {
        return $this->is_blurred;
    }

    /**
     * @param bool|null $is_blurred
     *
     * @return BackgroundTypeWallpaper
     */
    public function setIsBlurred(?bool $is_blurred): BackgroundTypeWallpaper
    {
        $this->is_blurred = $is_blurred;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMoving(): ?bool
    {
        return $this->is_moving;
    }

    /**
     * @param bool|null $is_moving
     *
     * @return BackgroundTypeWallpaper
     */
    public function setIsMoving(?bool $is_moving): BackgroundTypeWallpaper
    {
        $this->is_moving = $is_moving;
        return $this;
    }
}
