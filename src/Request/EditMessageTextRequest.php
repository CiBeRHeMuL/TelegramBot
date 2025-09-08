<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\LinkPreviewOptions;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#editmessagetext
 */
class EditMessageTextRequest implements RequestInterface
{
    /**
     * @param string $text New text of the message, 1-4096 characters after entities parsing
     * @param ChatId|null $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username
     * of the target channel (in the format \@channelusername)
     * @param MessageEntity[]|null $entities A JSON-serialized list of special entities that appear in message text, which can be
     * specified instead of parse_mode
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param LinkPreviewOptions|null $link_preview_options Link preview generation options for the message
     * @param int|null $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the message text. See formatting options for more
     * details.
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for an inline keyboard.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message to
     * be edited was sent
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#linkpreviewoptions LinkPreviewOptions
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private string $text,
        private ?ChatId $chat_id = null,
        private ?array $entities = null,
        private ?string $inline_message_id = null,
        private ?LinkPreviewOptions $link_preview_options = null,
        private ?int $message_id = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?string $business_connection_id = null,
    ) {}

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): EditMessageTextRequest
    {
        $this->text = $text;
        return $this;
    }

    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(?ChatId $chat_id): EditMessageTextRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getEntities(): ?array
    {
        return $this->entities;
    }

    public function setEntities(?array $entities): EditMessageTextRequest
    {
        $this->entities = $entities;
        return $this;
    }

    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(?string $inline_message_id): EditMessageTextRequest
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->link_preview_options;
    }

    public function setLinkPreviewOptions(?LinkPreviewOptions $link_preview_options): EditMessageTextRequest
    {
        $this->link_preview_options = $link_preview_options;
        return $this;
    }

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function setMessageId(?int $message_id): EditMessageTextRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): EditMessageTextRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditMessageTextRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): EditMessageTextRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }
}
