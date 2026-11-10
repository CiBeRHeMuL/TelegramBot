<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region CLASS_DeleteStickerFromSetRequest
/**
 * @see https://core.telegram.org/bots/api#deletestickerfromset
 */
class DeleteStickerFromSetRequest implements RequestInterface
{
    /**
     * @param string $sticker File identifier of the sticker
     */
    public function __construct(
        private string $sticker,
    ) {}

    public function getSticker(): string
    {
        return $this->sticker;
    }

    public function setSticker(string $sticker): DeleteStickerFromSetRequest
    {
        $this->sticker = $sticker;

        return $this;
    }
}
// endregion CLASS_DeleteStickerFromSetRequest
