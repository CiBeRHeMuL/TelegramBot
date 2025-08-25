<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#deletestickerfromset
 */
class DeleteStickerFromSetRequest implements RequestInterface
{
    /**
     * @param string $sticker File identifier of the sticker
     */
    public function __construct(
        private string $sticker,
    ) {
    }

    public function getSticker(): string
    {
        return $this->sticker;
    }

    public function setSticker(string $sticker): DeleteStickerFromSetRequest
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'sticker' => $this->sticker,
        ];
    }
}
