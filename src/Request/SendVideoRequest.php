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

class SendVideoRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format
     * @param string|Filename|Url $video Video to send. Pass a file_id as String to send a video that exists on the Telegram
     * servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new
     * video using multipart/form-data. More information on Sending Files.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the
     * message will be sent.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum
     * supergroups only.
     * @param int|null $duration Duration of sent video in seconds.
     * @param int|null $width Video width.
     * @param int|null $height Video height.
     * @param string|Filename|Url|null $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the
     * file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     * width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails
     * can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the
     * thumbnail was uploaded using multipart/form-data under <file_attach_name>.
     * @param string|null $caption Video caption (may also be used when resending videos by file_id), 0-1024 characters
     * after entities parsing.
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the video caption. See formatting options for more
     * details.
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode.
     * @param bool|null $has_spoiler Pass True if the video needs to be covered with a spoiler animation.
     * @param bool|null $supports_streaming Pass True if the uploaded video is suitable for streaming.
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no
     * sound.
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving.
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to.
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     * Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions
     * to remove a reply keyboard or to force a reply from the user.
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param bool|null $show_caption_above_media Optional. True, if the caption must be shown above the message media
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second,
     * ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance.
     * @param string|Filename|Url|null $cover Cover for the video in the message.
     * Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet,
     * or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
     * @param int|null $start_timestamp Start timestamp for the video in the message
     *
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     */
    public function __construct(
        private ChatId $chat_id,
        private string|Filename|Url $video,
        private ?string $business_connection_id = null,
        private ?int $message_thread_id = null,
        private ?int $duration = null,
        private ?int $width = null,
        private ?int $height = null,
        private string|Filename|Url|null $thumbnail = null,
        private ?string $caption = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?array $caption_entities = null,
        private ?bool $has_spoiler = null,
        private ?bool $supports_streaming = null,
        private ?bool $disable_notification = null,
        private ?bool $protect_content = null,
        private ?ReplyParameters $reply_parameters = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private string|null $message_effect_id = null,
        private bool|null $show_caption_above_media = null,
        private bool|null $allow_paid_broadcast = null,
        protected string|Filename|Url|null $cover = null,
        protected int|null $start_timestamp = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendVideoRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getVideo(): Filename|string|Url
    {
        return $this->video;
    }

    public function setVideo(Filename|Url|string $video): SendVideoRequest
    {
        $this->video = $video;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendVideoRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendVideoRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(int|null $duration): SendVideoRequest
    {
        $this->duration = $duration;
        return $this;
    }

    public function getWidth(): int|null
    {
        return $this->width;
    }

    public function setWidth(int|null $width): SendVideoRequest
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): int|null
    {
        return $this->height;
    }

    public function setHeight(int|null $height): SendVideoRequest
    {
        $this->height = $height;
        return $this;
    }

    public function getThumbnail(): Filename|string|Url|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Filename|Url|string|null $thumbnail): SendVideoRequest
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): SendVideoRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): SendVideoRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): SendVideoRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getHasSpoiler(): bool|null
    {
        return $this->has_spoiler;
    }

    public function setHasSpoiler(bool|null $has_spoiler): SendVideoRequest
    {
        $this->has_spoiler = $has_spoiler;
        return $this;
    }

    public function getSupportsStreaming(): bool|null
    {
        return $this->supports_streaming;
    }

    public function setSupportsStreaming(bool|null $supports_streaming): SendVideoRequest
    {
        $this->supports_streaming = $supports_streaming;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendVideoRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendVideoRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendVideoRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getReplyMarkup(): ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup): SendVideoRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getMessageEffectId(): string|null
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(string|null $message_effect_id): SendVideoRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getShowCaptionAboveMedia(): bool|null
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): SendVideoRequest
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): SendVideoRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function getCover(): Filename|string|Url|null
    {
        return $this->cover;
    }

    public function setCover(Filename|string|Url|null $cover): void
    {
        $this->cover = $cover;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'video' => ($this->video instanceof Url)
                ? $this->video->getUrl()
                : $this->video,
            'business_connection_id' => $this->business_connection_id,
            'message_thread_id' => $this->message_thread_id,
            'duration' => $this->duration,
            'width' => $this->width,
            'height' => $this->height,
            'thumbnail' => $this->thumbnail
                ? (($this->thumbnail instanceof Url) ? $this->thumbnail->getUrl() : $this->thumbnail)
                : null,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode?->value,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(fn(MessageEntity $me) => $me->toArray(), $this->caption_entities)
                : null,
            'has_spoiler' => $this->has_spoiler,
            'supports_streaming' => $this->supports_streaming,
            'disable_notification' => $this->disable_notification,
            'protect_content' => $this->protect_content,
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'reply_markup' => $this->reply_markup?->toArray(),
            'message_effect_id' => $this->message_effect_id,
            'show_caption_above_media' => $this->show_caption_above_media,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
            'cover' => $this->cover
                ? (($this->cover instanceof Url) ? $this->cover->getUrl() : $this->cover)
                : null,
            'start_timestamp' => $this->start_timestamp,
        ];
    }
}
