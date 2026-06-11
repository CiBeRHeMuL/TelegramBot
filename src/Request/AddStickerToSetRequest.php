<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InputSticker;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API addStickerToSet method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#addstickertoset
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Add, Sticker, To, Set
// STRUCTURE: ▶ ┌name + sticker + user_id┐ → ◇ construct → ⊕ → ∑ ⟦AddStickerToSetRequest⟧

// region CLASS_AddStickerToSetRequest
/**
 * @see https://core.telegram.org/bots/api#addstickertoset
 */
class AddStickerToSetRequest implements RequestInterface
{
    /**
     * @param string       $name    Sticker set name
     * @param InputSticker $sticker A JSON-serialized object with information about the added sticker. If exactly the same sticker
     *                              had already been added to the set, then the set isn't changed.
     * @param int          $user_id User identifier of sticker set owner
     *
     * @see https://core.telegram.org/bots/api#inputsticker InputSticker
     */
    public function __construct(
        private string $name,
        private InputSticker $sticker,
        private int $user_id,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AddStickerToSetRequest
    {
        $this->name = $name;

        return $this;
    }

    public function getSticker(): InputSticker
    {
        return $this->sticker;
    }

    public function setSticker(InputSticker $sticker): AddStickerToSetRequest
    {
        $this->sticker = $sticker;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): AddStickerToSetRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_AddStickerToSetRequest
