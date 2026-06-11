<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API approveSuggestedPost method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#approvesuggestedpost
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Approve, Suggested, Post
// STRUCTURE: ▶ ┌chat_id + message_id + send_date┐ → ◇ construct → ⊕ → ∑ ⟦ApproveSuggestedPostRequest⟧

// region CLASS_ApproveSuggestedPostRequest
/**
 * @see https://core.telegram.org/bots/api#approvesuggestedpost
 */
class ApproveSuggestedPostRequest implements RequestInterface
{
    /**
     * @param ChatId   $chat_id    Unique identifier for the target direct messages chat
     * @param int      $message_id Identifier of a suggested post message to approve
     * @param int|null $send_date  Point in time (Unix timestamp) when the post is expected to be published; omit if the date has
     *                             already been specified when the suggested post was created. If specified, then the date must be not more than 2678400 seconds
     *                             (30 days) in the future
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
        private ?int $send_date = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): ApproveSuggestedPostRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): ApproveSuggestedPostRequest
    {
        $this->message_id = $message_id;

        return $this;
    }

    public function getSendDate(): ?int
    {
        return $this->send_date;
    }

    public function setSendDate(?int $send_date): ApproveSuggestedPostRequest
    {
        $this->send_date = $send_date;

        return $this;
    }
}
// endregion CLASS_ApproveSuggestedPostRequest
