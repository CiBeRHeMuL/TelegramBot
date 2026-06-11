<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteStickerSet method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deletestickerset
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, Sticker, Set
// STRUCTURE: ▶ ┌name┐ → ◇ construct → ⊕ → ∑ ⟦DeleteStickerSetRequest⟧

// region CLASS_DeleteStickerSetRequest
/**
 * @see https://core.telegram.org/bots/api#deletestickerset
 */
class DeleteStickerSetRequest implements RequestInterface
{
    /**
     * @param string $name Sticker set name
     */
    public function __construct(
        private string $name,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): DeleteStickerSetRequest
    {
        $this->name = $name;

        return $this;
    }
}
// endregion CLASS_DeleteStickerSetRequest
