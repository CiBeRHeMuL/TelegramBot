<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;
use stdClass;

/**
 * The paid media isn't available before the payment.
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

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(int|null $duration): PaidMediaPreview
    {
        $this->duration = $duration;
        return $this;
    }

    public function getHeight(): int|null
    {
        return $this->height;
    }

    public function setHeight(int|null $height): PaidMediaPreview
    {
        $this->height = $height;
        return $this;
    }

    public function getWidth(): int|null
    {
        return $this->width;
    }

    public function setWidth(int|null $width): PaidMediaPreview
    {
        $this->width = $width;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'duration' => $this->duration,
            'height' => $this->height,
            'width' => $this->width,
        ];
    }
}
