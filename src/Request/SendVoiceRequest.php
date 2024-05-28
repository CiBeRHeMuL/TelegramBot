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
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

class SendVoiceRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param Filename|Url|string $voice Audio file to send. Pass a file_id as String to send a file that exists on the Telegram
     * servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using
     * multipart/form-data. More information on Sending Files »
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param string|null $caption Voice message caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param int|null $duration Duration of the voice message in seconds
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the voice message caption. See formatting options
     * for more details.
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     * a reply from the user
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     */
    public function __construct(
        private ChatId $chat_id,
        private Filename|Url|string $voice,
        private string|null $business_connection_id = null,
        private string|null $caption = null,
        private array|null $caption_entities = null,
        private bool|null $disable_notification = null,
        private int|null $duration = null,
        private int|null $message_thread_id = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private bool|null $protect_content = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ReplyParameters|null $reply_parameters = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendVoiceRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getVoice(): Filename|string|Url
    {
        return $this->voice;
    }

    public function setVoice(Filename|Url|string $voice): SendVoiceRequest
    {
        $this->voice = $voice;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendVoiceRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): SendVoiceRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): SendVoiceRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendVoiceRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(int|null $duration): SendVoiceRequest
    {
        $this->duration = $duration;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendVoiceRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): SendVoiceRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendVoiceRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyMarkup(): ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup): SendVoiceRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendVoiceRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'voice' => ($this->voice instanceof Url)
                ? $this->voice->getUrl()
                : $this->voice,
            'business_connection_id' => $this->business_connection_id,
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities
                ? array_map(fn($e) => $e->toArray(), $this->caption_entities)
                : null,
            'disable_notification' => $this->disable_notification,
            'duration' => $this->duration,
            'message_thread_id' => $this->message_thread_id,
            'parse_mode' => $this->parse_mode?->value,
            'protect_content' => $this->protect_content,
            'reply_markup' => $this->reply_markup->toArray(),
            'reply_parameters' => $this->reply_parameters->toArray(),
        ];
    }
}
