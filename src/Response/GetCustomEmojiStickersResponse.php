<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Sticker;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getCustomEmojiStickers method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get custom emoji stickers, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ Sticker[]

// region CLASS_GetCustomEmojiStickersResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetCustomEmojiStickersResponse extends AbstractResponse
{
    /**
     * @param RawResponse    $rawResponse
     * @param Sticker[]|null $emojiStickers
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $emojiStickers = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getEmojiStickers(): ?array
    {
        return $this->emojiStickers;
    }
}

// endregion CLASS_GetCustomEmojiStickersResponse
