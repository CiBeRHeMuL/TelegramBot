<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteStickerFromSet method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deletestickerfromset
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, Sticker, From, Set
// STRUCTURE: ▶ ┌sticker┐ → ◇ construct → ⊕ → ∑ ⟦DeleteStickerFromSetRequest⟧

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
