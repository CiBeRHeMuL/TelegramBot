<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Enum\DiceEmojiEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class SendDiceRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param DiceEmojiEnum|null $emoji Emoji on which the dice throw animation is based. Currently, must be one of “🎲”, “🎯”, “🏀”, “⚽”, “🎳”, or
     * “🎰”. Dice can have values 1-6 for “🎲”, “🎯” and “🎳”, values 1-5 for “🏀” and “⚽”, and values 1-64 for “🎰”. Defaults to “🎲”
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     * a reply from the user
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     */
    public function __construct(
        private ChatId $chat_id,
        private string|null $business_connection_id = null,
        private bool|null $disable_notification = null,
        private DiceEmojiEnum|null $emoji = null,
        private int|null $message_thread_id = null,
        private bool|null $protect_content = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ReplyParameters|null $reply_parameters = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendDiceRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendDiceRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendDiceRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getEmoji(): DiceEmojiEnum|null
    {
        return $this->emoji;
    }

    public function setEmoji(DiceEmojiEnum|null $emoji): SendDiceRequest
    {
        $this->emoji = $emoji;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendDiceRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendDiceRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyMarkup(): ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup): SendDiceRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendDiceRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'business_connection_id' => $this->business_connection_id,
            'disable_notification' => $this->disable_notification,
            'emoji' => $this->emoji?->value,
            'message_thread_id' => $this->message_thread_id,
            'protect_content' => $this->protect_content,
            'reply_markup' => $this->reply_markup?->toArray(),
            'reply_parameters' => $this->reply_parameters?->toArray(),
        ];
    }
}
