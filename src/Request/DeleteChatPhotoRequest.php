<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteChatPhoto method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deletechatphoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, Chat, Photo
// STRUCTURE: ▶ ┌chat_id┐ → ◇ construct → ⊕ → ∑ ⟦DeleteChatPhotoRequest⟧

// region CLASS_DeleteChatPhotoRequest
/**
 * @see https://core.telegram.org/bots/api#deletechatphoto
 */
class DeleteChatPhotoRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel in the format \@username
     */
    public function __construct(
        private ChatId $chat_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeleteChatPhotoRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }
}
// endregion CLASS_DeleteChatPhotoRequest
