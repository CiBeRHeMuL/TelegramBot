<?php

namespace AndrewGos\TelegramBot\Request;

class SetStickerPositionInSetRequest implements RequestInterface
{
    /**
     * @param int $position New sticker position in the set, zero-based
     * @param string $sticker File identifier of the sticker
     */
    public function __construct(
        private int $position,
        private string $sticker,
    ) {
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): SetStickerPositionInSetRequest
    {
        $this->position = $position;
        return $this;
    }

    public function getSticker(): string
    {
        return $this->sticker;
    }

    public function setSticker(string $sticker): SetStickerPositionInSetRequest
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'position' => $this->position,
            'sticker' => $this->sticker,
        ];
    }
}
