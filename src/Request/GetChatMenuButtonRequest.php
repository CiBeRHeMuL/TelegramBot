<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getChatMenuButton method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getchatmenubutton
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, Chat, Menu, Button
// STRUCTURE: ▶ ┌chat_id┐ → ◇ construct → ⊕ → ∑ ⟦GetChatMenuButtonRequest⟧

// region CLASS_GetChatMenuButtonRequest
/**
 * @see https://core.telegram.org/bots/api#getchatmenubutton
 */
class GetChatMenuButtonRequest implements RequestInterface
{
    /**
     * @param ChatId|null $chat_id Unique identifier for the target private chat. If not specified, default bot's menu button will
     *                             be returned
     */
    public function __construct(
        private ?ChatId $chat_id = null,
    ) {}

    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(?ChatId $chat_id): GetChatMenuButtonRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }
}
// endregion CLASS_GetChatMenuButtonRequest
