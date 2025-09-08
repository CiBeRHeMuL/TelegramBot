<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#editmessagecaption
 */
class EditMessageCaptionRequest implements RequestInterface
{
    /**
     * @param string|null $caption New caption of the message, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode
     * @param ChatId|null $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username
     * of the target channel (in the format \@channelusername)
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param int|null $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the message caption. See formatting options for
     * more details.
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for an inline keyboard.
     * @param bool|null $show_caption_above_media Pass True, if the caption must be shown above the message media. Supported only
     * for animation, photo and video messages.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message to
     * be edited was sent
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ?string $caption = null,
        private ?array $caption_entities = null,
        private ?ChatId $chat_id = null,
        private ?string $inline_message_id = null,
        private ?int $message_id = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?bool $show_caption_above_media = null,
        private ?string $business_connection_id = null,
    ) {}

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): EditMessageCaptionRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): EditMessageCaptionRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(?ChatId $chat_id): EditMessageCaptionRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(?string $inline_message_id): EditMessageCaptionRequest
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function setMessageId(?int $message_id): EditMessageCaptionRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): EditMessageCaptionRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditMessageCaptionRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): EditMessageCaptionRequest
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): EditMessageCaptionRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }
}
