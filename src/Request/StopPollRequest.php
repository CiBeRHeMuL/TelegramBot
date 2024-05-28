<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class StopPollRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $message_id Identifier of the original message with the poll
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for a new message inline keyboard.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf
     * of which the message to be edited was sent
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private string|null $business_connection_id = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): StopPollRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): StopPollRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): StopPollRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): StopPollRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_id' => $this->message_id,
            'reply_markup' => $this->reply_markup?->toArray(),
            'business_connection_id' => $this->business_connection_id,
        ];
    }
}
