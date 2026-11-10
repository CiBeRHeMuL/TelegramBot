<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region CLASS_EditEphemeralMessageCaptionRequest
/**
 * @see https://core.telegram.org/bots/api#editephemeralmessagecaption
 */
class EditEphemeralMessageCaptionRequest implements RequestInterface
{
    /**
     * @param ChatId                     $chat_id                  Unique identifier for the target chat or username of the target bot, supergroup or channel in the format @username
     * @param int                        $receiver_user_id         Identifier of the user who received the message; required if the message is an ephemeral message
     * @param int                        $ephemeral_message_id     Identifier of the ephemeral message to edit
     * @param string|null                $caption                  Optional. New caption of the message, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode               Optional. Mode for parsing entities in the message caption. See formatting options for more details.
     * @param MessageEntity[]|null       $caption_entities         Optional. A JSON-serialized list of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param InlineKeyboardMarkup|null  $reply_markup             Optional. A JSON-serialized object for an inline keyboard
     * @param bool|null                  $show_caption_above_media Optional. Pass True if the caption must be shown above the message media
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private int $receiver_user_id,
        private int $ephemeral_message_id,
        private ?string $caption = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?array $caption_entities = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?bool $show_caption_above_media = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): EditEphemeralMessageCaptionRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getReceiverUserId(): int
    {
        return $this->receiver_user_id;
    }

    public function setReceiverUserId(int $receiver_user_id): EditEphemeralMessageCaptionRequest
    {
        $this->receiver_user_id = $receiver_user_id;

        return $this;
    }

    public function getEphemeralMessageId(): int
    {
        return $this->ephemeral_message_id;
    }

    public function setEphemeralMessageId(int $ephemeral_message_id): EditEphemeralMessageCaptionRequest
    {
        $this->ephemeral_message_id = $ephemeral_message_id;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): EditEphemeralMessageCaptionRequest
    {
        $this->caption = $caption;

        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): EditEphemeralMessageCaptionRequest
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): EditEphemeralMessageCaptionRequest
    {
        $this->caption_entities = $caption_entities;

        return $this;
    }

    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): EditEphemeralMessageCaptionRequest
    {
        $this->show_caption_above_media = $show_caption_above_media;

        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditEphemeralMessageCaptionRequest
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
// endregion CLASS_EditEphemeralMessageCaptionRequest
