<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\MaskPosition;

class SetStickerMaskPositionRequest implements RequestInterface
{
    /**
     * @param string $sticker File identifier of the sticker
     * @param MaskPosition|null $mask_position A JSON-serialized object with the position where the mask should be placed on faces.
     * Omit the parameter to remove the mask position.
     */
    public function __construct(
        private string $sticker,
        private MaskPosition|null $mask_position = null,
    ) {
    }

    public function getSticker(): string
    {
        return $this->sticker;
    }

    public function setSticker(string $sticker): SetStickerMaskPositionRequest
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getMaskPosition(): MaskPosition|null
    {
        return $this->mask_position;
    }

    public function setMaskPosition(MaskPosition|null $mask_position): SetStickerMaskPositionRequest
    {
        $this->mask_position = $mask_position;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'sticker' => $this->sticker,
            'mask_position' => $this->mask_position?->toArray(),
        ];
    }
}
