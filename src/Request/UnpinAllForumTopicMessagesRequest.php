<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API unpinAllForumTopicMessages method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#unpinallforumtopicmessages
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Unpin, All, Forum, Topic, Messages
// STRUCTURE: ▶ ┌chat_id + message_thread_id┐ → ◇ construct → ⊕ → ∑ ⟦UnpinAllForumTopicMessagesRequest⟧

// region CLASS_UnpinAllForumTopicMessagesRequest
/**
 * @see https://core.telegram.org/bots/api#unpinallforumtopicmessages
 */
class UnpinAllForumTopicMessagesRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id           Unique identifier for the target chat or username of the target supergroup in the format \@username
     * @param int    $message_thread_id Unique identifier for the target message thread of the forum topic
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_thread_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): UnpinAllForumTopicMessagesRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getMessageThreadId(): int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int $message_thread_id): UnpinAllForumTopicMessagesRequest
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }
}
// endregion CLASS_UnpinAllForumTopicMessagesRequest
