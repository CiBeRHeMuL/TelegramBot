<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputMedia;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API editEphemeralMessageMedia method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#editephemeralmessagemedia
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Edit, Ephemeral, Message, Media
// STRUCTURE: ▶ ┌chat_id + receiver_user_id + ephemeral_message_id + media + reply_markup┐ → ◇ construct → ⊕ → ∑ ⟦EditEphemeralMessageMediaRequest⟧

// region CLASS_EditEphemeralMessageMediaRequest
/**
 * @see https://core.telegram.org/bots/api#editephemeralmessagemedia
 */
class EditEphemeralMessageMediaRequest implements RequestInterface
{
    /**
     * @param ChatId                    $chat_id              Unique identifier for the target chat or username of the target bot, supergroup or channel in the format @username
     * @param int                       $receiver_user_id     Identifier of the user who received the message; required if the message is an ephemeral message
     * @param int                       $ephemeral_message_id Identifier of the ephemeral message to edit
     * @param AbstractInputMedia|null   $media                Optional. A JSON-serialized object for a new media content of the message
     * @param InlineKeyboardMarkup|null $reply_markup         Optional. A JSON-serialized object for an inline keyboard
     *
     * @see https://core.telegram.org/bots/api#inputmedia InputMedia
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private int $receiver_user_id,
        private int $ephemeral_message_id,
        private ?AbstractInputMedia $media = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): EditEphemeralMessageMediaRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getReceiverUserId(): int
    {
        return $this->receiver_user_id;
    }

    public function setReceiverUserId(int $receiver_user_id): EditEphemeralMessageMediaRequest
    {
        $this->receiver_user_id = $receiver_user_id;

        return $this;
    }

    public function getEphemeralMessageId(): int
    {
        return $this->ephemeral_message_id;
    }

    public function setEphemeralMessageId(int $ephemeral_message_id): EditEphemeralMessageMediaRequest
    {
        $this->ephemeral_message_id = $ephemeral_message_id;

        return $this;
    }

    public function getMedia(): ?AbstractInputMedia
    {
        return $this->media;
    }

    public function setMedia(?AbstractInputMedia $media): EditEphemeralMessageMediaRequest
    {
        $this->media = $media;

        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditEphemeralMessageMediaRequest
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}
// endregion CLASS_EditEphemeralMessageMediaRequest
