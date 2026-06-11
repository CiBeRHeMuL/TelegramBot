<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getStickerSet method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getstickerset
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, Sticker, Set
// STRUCTURE: ▶ ┌name┐ → ◇ construct → ⊕ → ∑ ⟦GetStickerSetRequest⟧

// region CLASS_GetStickerSetRequest
/**
 * @see https://core.telegram.org/bots/api#getstickerset
 */
class GetStickerSetRequest implements RequestInterface
{
    /**
     * @param string $name Name of the sticker set
     */
    public function __construct(
        private string $name,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): GetStickerSetRequest
    {
        $this->name = $name;

        return $this;
    }
}
// endregion CLASS_GetStickerSetRequest
