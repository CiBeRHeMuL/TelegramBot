<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setChatStickerSet method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setchatstickerset
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Chat, Sticker, Set
// STRUCTURE: ▶ ┌chat_id + sticker_set_name┐ → ◇ construct → ⊕ → ∑ ⟦SetChatStickerSetRequest⟧

// region CLASS_SetChatStickerSetRequest
/**
 * @see https://core.telegram.org/bots/api#setchatstickerset
 */
class SetChatStickerSetRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id          Unique identifier for the target chat or username of the target supergroup in the format \@username
     * @param string $sticker_set_name Name of the sticker set to be set as the group sticker set
     */
    public function __construct(
        private ChatId $chat_id,
        private string $sticker_set_name,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatStickerSetRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getStickerSetName(): string
    {
        return $this->sticker_set_name;
    }

    public function setStickerSetName(string $sticker_set_name): SetChatStickerSetRequest
    {
        $this->sticker_set_name = $sticker_set_name;

        return $this;
    }
}
// endregion CLASS_SetChatStickerSetRequest
