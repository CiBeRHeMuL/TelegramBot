<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setChatTitle method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setchattitle
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Chat, Title
// STRUCTURE: ▶ ┌chat_id + title┐ → ◇ construct → ⊕ → ∑ ⟦SetChatTitleRequest⟧

// region CLASS_SetChatTitleRequest
/**
 * @see https://core.telegram.org/bots/api#setchattitle
 */
class SetChatTitleRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel in the format \@username
     * @param string $title   New chat title, 1-128 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private string $title,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatTitleRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): SetChatTitleRequest
    {
        $this->title = $title;

        return $this;
    }
}
// endregion CLASS_SetChatTitleRequest
