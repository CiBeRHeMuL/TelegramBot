<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InputSticker;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API replaceStickerInSet method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#replacestickerinset
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Replace, Sticker, In, Set
// STRUCTURE: ▶ ┌name + old_sticker + sticker + user_id┐ → ◇ construct → ⊕ → ∑ ⟦ReplaceStickerInSetRequest⟧

// region CLASS_ReplaceStickerInSetRequest
/**
 * @see https://core.telegram.org/bots/api#replacestickerinset
 */
class ReplaceStickerInSetRequest implements RequestInterface
{
    /**
     * @param string       $name        Sticker set name
     * @param string       $old_sticker File identifier of the replaced sticker
     * @param InputSticker $sticker     A JSON-serialized object with information about the added sticker. If exactly the same sticker
     *                                  had already been added to the set, then the set remains unchanged.
     * @param int          $user_id     User identifier of the sticker set owner
     *
     * @see https://core.telegram.org/bots/api#inputsticker InputSticker
     */
    public function __construct(
        private string $name,
        private string $old_sticker,
        private InputSticker $sticker,
        private int $user_id,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ReplaceStickerInSetRequest
    {
        $this->name = $name;

        return $this;
    }

    public function getOldSticker(): string
    {
        return $this->old_sticker;
    }

    public function setOldSticker(string $old_sticker): ReplaceStickerInSetRequest
    {
        $this->old_sticker = $old_sticker;

        return $this;
    }

    public function getSticker(): InputSticker
    {
        return $this->sticker;
    }

    public function setSticker(InputSticker $sticker): ReplaceStickerInSetRequest
    {
        $this->sticker = $sticker;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): ReplaceStickerInSetRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_ReplaceStickerInSetRequest
