<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setStickerKeywords method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setstickerkeywords
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Sticker, Keywords
// STRUCTURE: ▶ ┌sticker + keywords┐ → ◇ construct → ⊕ → ∑ ⟦SetStickerKeywordsRequest⟧

// region CLASS_SetStickerKeywordsRequest
/**
 * @see https://core.telegram.org/bots/api#setstickerkeywords
 */
class SetStickerKeywordsRequest implements RequestInterface
{
    /**
     * @param string        $sticker  File identifier of the sticker
     * @param string[]|null $keywords A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64
     *                                characters
     */
    public function __construct(
        private string $sticker,
        private ?array $keywords = null,
    ) {}

    public function getSticker(): string
    {
        return $this->sticker;
    }

    public function setSticker(string $sticker): SetStickerKeywordsRequest
    {
        $this->sticker = $sticker;

        return $this;
    }

    public function getKeywords(): ?array
    {
        return $this->keywords;
    }

    public function setKeywords(?array $keywords): SetStickerKeywordsRequest
    {
        $this->keywords = $keywords;

        return $this;
    }
}
// endregion CLASS_SetStickerKeywordsRequest
