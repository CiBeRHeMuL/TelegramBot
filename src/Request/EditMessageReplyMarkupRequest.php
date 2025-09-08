<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#editmessagereplymarkup
 */
class EditMessageReplyMarkupRequest implements RequestInterface
{
    /**
     * @param ChatId|null $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username
     * of the target channel (in the format \@channelusername)
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param int|null $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for an inline keyboard.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message to
     * be edited was sent
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ?ChatId $chat_id = null,
        private ?string $inline_message_id = null,
        private ?int $message_id = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?string $business_connection_id = null,
    ) {}

    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(?ChatId $chat_id): EditMessageReplyMarkupRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(?string $inline_message_id): EditMessageReplyMarkupRequest
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function setMessageId(?int $message_id): EditMessageReplyMarkupRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditMessageReplyMarkupRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): EditMessageReplyMarkupRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }
}
