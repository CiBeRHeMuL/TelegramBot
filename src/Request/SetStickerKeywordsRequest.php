<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#setstickerkeywords
 */
class SetStickerKeywordsRequest implements RequestInterface
{
    /**
     * @param string $sticker File identifier of the sticker
     * @param string[]|null $keywords A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64
     * characters
     */
    public function __construct(
        private string $sticker,
        private array|null $keywords = null,
    ) {
    }

    public function getSticker(): string
    {
        return $this->sticker;
    }

    public function setSticker(string $sticker): SetStickerKeywordsRequest
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getKeywords(): array|null
    {
        return $this->keywords;
    }

    public function setKeywords(array|null $keywords): SetStickerKeywordsRequest
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'sticker' => $this->sticker,
            'keywords' => $this->keywords,
        ];
    }
}
