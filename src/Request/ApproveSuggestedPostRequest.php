<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#approvesuggestedpost
 */
class ApproveSuggestedPostRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target direct messages chat
     * @param int $message_id Identifier of a suggested post message to approve
     * @param int|null $send_date Point in time (Unix timestamp) when the post is expected to be published; omit if the date has
     * already been specified when the suggested post was created. If specified, then the date must be not more than 2678400 seconds
     * (30 days) in the future
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
        private int|null $send_date = null,
    ) {
    }

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

    public function getSendDate(): int|null
    {
        return $this->send_date;
    }

    public function setSendDate(int|null $send_date): ApproveSuggestedPostRequest
    {
        $this->send_date = $send_date;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_id' => $this->message_id,
            'send_date' => $this->send_date,
        ];
    }
}
