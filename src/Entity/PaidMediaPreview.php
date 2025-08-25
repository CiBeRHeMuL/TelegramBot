<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;
use stdClass;

/**
 * The paid media isn't available before the payment.
 *
 * @link https://core.telegram.org/bots/api#paidmediapreview
 */
#[BuildIf(new FieldIsChecker('type', PaidMediaTypeEnum::Preview->value))]
class PaidMediaPreview extends AbstractPaidMedia
{
    /**
     * @param int|null $duration Optional. Duration of the media in seconds as defined by the sender
     * @param int|null $height Optional. Media height as defined by the sender
     * @param int|null $width Optional. Media width as defined by the sender
     */
    public function __construct(
        protected int|null $duration = null,
        protected int|null $height = null,
        protected int|null $width = null,
    ) {
        parent::__construct(PaidMediaTypeEnum::Preview);
    }

    /**
     * @return int|null
     */
    public function getDuration(): int|null
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     *
     * @return PaidMediaPreview
     */
    public function setDuration(int|null $duration): PaidMediaPreview
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): int|null
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     *
     * @return PaidMediaPreview
     */
    public function setHeight(int|null $height): PaidMediaPreview
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): int|null
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     *
     * @return PaidMediaPreview
     */
    public function setWidth(int|null $width): PaidMediaPreview
    {
        $this->width = $width;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'duration' => $this->duration,
            'height' => $this->height,
            'width' => $this->width,
            'type' => $this->type->value,
        ];
    }
}
