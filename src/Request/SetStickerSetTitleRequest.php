<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setStickerSetTitle method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setstickersettitle
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Sticker, Set, Title
// STRUCTURE: ▶ ┌name + title┐ → ◇ construct → ⊕ → ∑ ⟦SetStickerSetTitleRequest⟧

// region CLASS_SetStickerSetTitleRequest
/**
 * @see https://core.telegram.org/bots/api#setstickersettitle
 */
class SetStickerSetTitleRequest implements RequestInterface
{
    /**
     * @param string $name  Sticker set name
     * @param string $title Sticker set title, 1-64 characters
     */
    public function __construct(
        private string $name,
        private string $title,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SetStickerSetTitleRequest
    {
        $this->name = $name;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): SetStickerSetTitleRequest
    {
        $this->title = $title;

        return $this;
    }
}
// endregion CLASS_SetStickerSetTitleRequest
