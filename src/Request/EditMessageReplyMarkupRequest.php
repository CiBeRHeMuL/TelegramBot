<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class EditMessageReplyMarkupRequest implements RequestInterface
{
    /**
     * @param ChatId|null $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username
     * of the target channel (in the format @channelusername)
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param int|null $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for an inline keyboard.
     */
    public function __construct(
        private ChatId|null $chat_id = null,
        private string|null $inline_message_id = null,
        private int|null $message_id = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
    ) {
    }

    public function getChatId(): ChatId|null
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId|null $chat_id): EditMessageReplyMarkupRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getInlineMessageId(): string|null
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(string|null $inline_message_id): EditMessageReplyMarkupRequest
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getMessageId(): int|null
    {
        return $this->message_id;
    }

    public function setMessageId(int|null $message_id): EditMessageReplyMarkupRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): EditMessageReplyMarkupRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id?->getId(),
            'inline_message_id' => $this->inline_message_id,
            'message_id' => $this->message_id,
            'reply_markup' => $this->reply_markup?->toArray(),
        ];
    }
}
