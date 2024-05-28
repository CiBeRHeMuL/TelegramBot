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

class SendAudioRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format
     * @param string|Filename|Url $audio Audio file to send. Pass a file_id as String to send an audio file that exists on
     * the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the
     * Internet, or upload a new one using multipart/form-data.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the
     * message will be sent.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum
     * supergroups only.
     * @param string|null $caption Audio caption, 0-1024 characters after entities parsing.
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the audio caption. See formatting options for more
     * details.
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode.
     * @param int|null $duration Duration of the audio in seconds.
     * @param string|null $performer Performer.
     * @param string|null $title Track name.
     * @param string|Filename|Url|null $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the
     * file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     * width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails
     * can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the
     * thumbnail was uploaded using multipart/form-data under <file_attach_name>.
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no
     * sound.
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving.
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to.
     * @param $reply_markup InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
     * Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions
     * to remove a reply keyboard or to force a reply from the user.
     * @channelusername).
     */
    public function __construct(
        private ChatId $chat_id,
        private string|Filename|Url $audio,
        private string|null $business_connection_id = null,
        private int|null $message_thread_id = null,
        private string|null $caption = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private array|null $caption_entities = null,
        private int|null $duration = null,
        private string|null $performer = null,
        private string|null $title = null,
        private string|Filename|Url|null $thumbnail = null,
        private bool|null $disable_notification = null,
        private bool|null $protect_content = null,
        private ReplyParameters|null $reply_parameters = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendAudioRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getAudio(): Filename|string|Url
    {
        return $this->audio;
    }

    public function setAudio(Filename|Url|string $audio): SendAudioRequest
    {
        $this->audio = $audio;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendAudioRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendAudioRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): SendAudioRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): SendAudioRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): SendAudioRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(int|null $duration): SendAudioRequest
    {
        $this->duration = $duration;
        return $this;
    }

    public function getPerformer(): string|null
    {
        return $this->performer;
    }

    public function setPerformer(string|null $performer): SendAudioRequest
    {
        $this->performer = $performer;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): SendAudioRequest
    {
        $this->title = $title;
        return $this;
    }

    public function getThumbnail(): Filename|string|Url|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Filename|Url|string|null $thumbnail): SendAudioRequest
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendAudioRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendAudioRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendAudioRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getReplyMarkup(): ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup): SendAudioRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'audio' => ($this->audio instanceof Url)
                ? $this->audio->getUrl()
                : $this->audio,
            'business_connection_id' => $this->business_connection_id,
            'message_thread_id' => $this->message_thread_id,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode?->value,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(fn(MessageEntity $me) => $me->toArray(), $this->caption_entities)
                : null,
            'duration' => $this->duration,
            'performer' => $this->performer,
            'title' => $this->title,
            'thumbnail' => $this->thumbnail
                ? (($this->thumbnail instanceof Url) ? $this->thumbnail->getUrl() : $this->thumbnail)
                : null,
            'disable_notification' => $this->disable_notification,
            'protect_content' => $this->protect_content,
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'reply_markup' => $this->reply_markup?->toArray(),
        ];
    }
}
