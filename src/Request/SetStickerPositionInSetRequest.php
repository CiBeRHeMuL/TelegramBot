<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setStickerPositionInSet method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setstickerpositioninset
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Sticker, Position, In, Set
// STRUCTURE: ▶ ┌position + sticker┐ → ◇ construct → ⊕ → ∑ ⟦SetStickerPositionInSetRequest⟧

// region CLASS_SetStickerPositionInSetRequest
/**
 * @see https://core.telegram.org/bots/api#setstickerpositioninset
 */
class SetStickerPositionInSetRequest implements RequestInterface
{
    /**
     * @param int    $position New sticker position in the set, zero-based
     * @param string $sticker  File identifier of the sticker
     */
    public function __construct(
        private int $position,
        private string $sticker,
    ) {}

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
}
// endregion CLASS_SetStickerPositionInSetRequest
