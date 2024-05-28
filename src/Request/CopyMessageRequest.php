<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class CopyMessageRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername).
     * @param ChatId $from_chat_id Unique identifier for the chat where the original message was sent
     * (or channel username in the format @channelusername).
     * @param int $message_id Message identifier in the chat specified in from_chat_id.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only.
     * @param string|null $caption New caption for media, 0-1024 characters after entities parsing. If not specified, the original caption is kept.
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the new caption.
     * See formatting options for more details.
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the new caption,
     * which can be specified instead of parse_mode.
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving.
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to.
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Optional
     * Additional interface options. A JSON-serialized object for an inline keyboard,
     * custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     * @param bool|null $show_caption_above_media Optional. True, if the caption must be shown above the message media
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second,
     * ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param int|null $video_start_timestamp New start timestamp for the copied video in the message
     *
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     */
    public function __construct(
        private ChatId $chat_id,
        private ChatId $from_chat_id,
        private int $message_id,
        private int|null $message_thread_id = null,
        private string|null $caption = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private array|null $caption_entities = null,
        private bool|null $disable_notification = null,
        private bool|null $protect_content = null,
        private ReplyParameters|null $reply_parameters = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private bool|null $show_caption_above_media = null,
        private bool|null $allow_paid_broadcast = null,
        private int|null $video_start_timestamp = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): CopyMessageRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getFromChatId(): ChatId
    {
        return $this->from_chat_id;
    }

    public function setFromChatId(ChatId $from_chat_id): CopyMessageRequest
    {
        $this->from_chat_id = $from_chat_id;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): CopyMessageRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): CopyMessageRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): CopyMessageRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): CopyMessageRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): CopyMessageRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): CopyMessageRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): CopyMessageRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): CopyMessageRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getReplyMarkup(): ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup): CopyMessageRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getShowCaptionAboveMedia(): bool|null
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): CopyMessageRequest
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): CopyMessageRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function getVideoStartTimestamp(): ?int
    {
        return $this->video_start_timestamp;
    }

    public function setVideoStartTimestamp(?int $video_start_timestamp): void
    {
        $this->video_start_timestamp = $video_start_timestamp;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_thread_id' => $this->message_thread_id,
            'from_chat_id' => $this->from_chat_id->getId(),
            'message_id' => $this->message_id,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode?->value,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(fn(MessageEntity $me) => $me->toArray(), $this->caption_entities)
                : null,
            'disable_notification' => $this->disable_notification,
            'protect_content' => $this->protect_content,
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'reply_markup' => $this->reply_markup?->toArray(),
            'show_caption_above_media' => $this->show_caption_above_media,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
            'video_start_timestamp' => $this->video_start_timestamp,
        ];
    }
}
