<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_RichBlockMap
/**
 * A block with a map, corresponding to the custom HTML tag <tg-map>.
 *
 * @see https://core.telegram.org/bots/api#richblockmap
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Map->value))]
final class RichBlockMap extends AbstractRichBlock
{
    /**
     * @param Location              $location Location of the center of the map
     * @param int                   $zoom     Map zoom level; 13-20
     * @param int                   $width    Expected width of the map
     * @param int                   $height   Expected height of the map
     * @param RichBlockCaption|null $caption  Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#location Location
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected Location $location,
        protected int $zoom,
        protected int $width,
        protected int $height,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Map);
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return RichBlockMap
     */
    public function setLocation(Location $location): RichBlockMap
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return int
     */
    public function getZoom(): int
    {
        return $this->zoom;
    }

    /**
     * @param int $zoom
     *
     * @return RichBlockMap
     */
    public function setZoom(int $zoom): RichBlockMap
    {
        $this->zoom = $zoom;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return RichBlockMap
     */
    public function setWidth(int $width): RichBlockMap
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return RichBlockMap
     */
    public function setHeight(int $height): RichBlockMap
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return RichBlockCaption|null
     */
    public function getCaption(): ?RichBlockCaption
    {
        return $this->caption;
    }

    /**
     * @param RichBlockCaption|null $caption
     *
     * @return RichBlockMap
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockMap
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockMap
