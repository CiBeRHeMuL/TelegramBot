<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\MaskPosition;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setStickerMaskPosition method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setstickermaskposition
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Sticker, Mask, Position
// STRUCTURE: ▶ ┌sticker + mask_position┐ → ◇ construct → ⊕ → ∑ ⟦SetStickerMaskPositionRequest⟧

// region CLASS_SetStickerMaskPositionRequest
/**
 * @see https://core.telegram.org/bots/api#setstickermaskposition
 */
class SetStickerMaskPositionRequest implements RequestInterface
{
    /**
     * @param string            $sticker       File identifier of the sticker
     * @param MaskPosition|null $mask_position A JSON-serialized object with the position where the mask should be placed on faces.
     *                                         Omit the parameter to remove the mask position.
     *
     * @see https://core.telegram.org/bots/api#maskposition MaskPosition
     */
    public function __construct(
        private string $sticker,
        private ?MaskPosition $mask_position = null,
    ) {}

    public function getSticker(): string
    {
        return $this->sticker;
    }

    public function setSticker(string $sticker): SetStickerMaskPositionRequest
    {
        $this->sticker = $sticker;

        return $this;
    }

    public function getMaskPosition(): ?MaskPosition
    {
        return $this->mask_position;
    }

    public function setMaskPosition(?MaskPosition $mask_position): SetStickerMaskPositionRequest
    {
        $this->mask_position = $mask_position;

        return $this;
    }
}
// endregion CLASS_SetStickerMaskPositionRequest
