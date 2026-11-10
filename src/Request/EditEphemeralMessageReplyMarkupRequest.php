<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region CLASS_EditEphemeralMessageReplyMarkupRequest
/**
 * @see https://core.telegram.org/bots/api#editephemeralmessagereplymarkup
 */
class EditEphemeralMessageReplyMarkupRequest implements RequestInterface
{
    /**
     * @param ChatId                    $chat_id              Unique identifier for the target chat or username of the target bot, supergroup or channel in the format @username
     * @param int                       $receiver_user_id     Identifier of the user who received the message; required if the message is an ephemeral message
     * @param int                       $ephemeral_message_id Identifier of the ephemeral message to edit
     * @param InlineKeyboardMarkup|null $reply_markup         Optional. A JSON-serialized object for an inline keyboard
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private int $receiver_user_id,
        private int $ephemeral_message_id,
        private ?InlineKeyboardMarkup $reply_markup = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): EditEphemeralMessageReplyMarkupRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getReceiverUserId(): int
    {
        return $this->receiver_user_id;
    }

    public function setReceiverUserId(int $receiver_user_id): EditEphemeralMessageReplyMarkupRequest
    {
        $this->receiver_user_id = $receiver_user_id;

        return $this;
    }

    public function getEphemeralMessageId(): int
    {
        return $this->ephemeral_message_id;
    }

    public function setEphemeralMessageId(int $ephemeral_message_id): EditEphemeralMessageReplyMarkupRequest
    {
        $this->ephemeral_message_id = $ephemeral_message_id;

        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditEphemeralMessageReplyMarkupRequest
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
// endregion CLASS_EditEphemeralMessageReplyMarkupRequest
