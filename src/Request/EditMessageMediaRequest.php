<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputMedia;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#editmessagemedia
 */
class EditMessageMediaRequest implements RequestInterface
{
    /**
     * @param AbstractInputMedia $media A JSON-serialized object for a new media content of the message
     * @param ChatId|null $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username
     * of the target channel (in the format \@channelusername)
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param int|null $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for a new inline keyboard.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message to
     * be edited was sent
     *
     * @see https://core.telegram.org/bots/api#inputmedia InputMedia
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private AbstractInputMedia $media,
        private ChatId|null $chat_id = null,
        private string|null $inline_message_id = null,
        private int|null $message_id = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private string|null $business_connection_id = null,
    ) {
    }

    public function getMedia(): AbstractInputMedia
    {
        return $this->media;
    }

    public function setMedia(AbstractInputMedia $media): EditMessageMediaRequest
    {
        $this->media = $media;
        return $this;
    }

    public function getChatId(): ChatId|null
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId|null $chat_id): EditMessageMediaRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getInlineMessageId(): string|null
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(string|null $inline_message_id): EditMessageMediaRequest
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getMessageId(): int|null
    {
        return $this->message_id;
    }

    public function setMessageId(int|null $message_id): EditMessageMediaRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): EditMessageMediaRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): EditMessageMediaRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'media' => $this->media->toArray(),
            'chat_id' => $this->chat_id?->getId(),
            'inline_message_id' => $this->inline_message_id,
            'message_id' => $this->message_id,
            'reply_markup' => $this->reply_markup?->toArray(),
            'business_connection_id' => $this->business_connection_id,
        ];
    }
}
