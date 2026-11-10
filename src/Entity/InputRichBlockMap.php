<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_InputRichBlockMap
/**
 * A block with a map, corresponding to the custom HTML tag <tg-map>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockmap
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Map->value))]
final class InputRichBlockMap extends AbstractInputRichBlock
{
    /**
     * @param Location              $location Location of the center of the map
     * @param int                   $zoom     Map zoom level; 0-24
     * @param int                   $width    Map width; 0-10000
     * @param int                   $height   Map height; 0-10000
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
     * @return InputRichBlockMap
     */
    public function setLocation(Location $location): InputRichBlockMap
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
     * @return InputRichBlockMap
     */
    public function setZoom(int $zoom): InputRichBlockMap
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
     * @return InputRichBlockMap
     */
    public function setWidth(int $width): InputRichBlockMap
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
     * @return InputRichBlockMap
     */
    public function setHeight(int $height): InputRichBlockMap
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
     * @return InputRichBlockMap
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockMap
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockMap
