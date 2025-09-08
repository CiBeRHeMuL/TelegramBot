<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Entity\SuggestedPostParameters;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * @link https://core.telegram.org/bots/api#sendvideo
 */
class SendVideoRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param Filename|Url|string $video Video to send. Pass a file_id as String to send a video that exists on the Telegram servers
     * (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data.
     * More information on Sending Files »
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param int|null $duration Duration of sent video in seconds
     * @param int|null $width Video width
     * @param int|null $height Video height
     * @param Filename|Url|string|null $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file
     * is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height
     * should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be
     * only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data
     * under <file_attach_name>. More information on Sending Files »
     * @param string|null $caption Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities
     * parsing
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the video caption. See formatting options for more
     * details.
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode
     * @param bool|null $has_spoiler Pass True if the video needs to be covered with a spoiler animation
     * @param bool|null $supports_streaming Pass True if the uploaded video is suitable for streaming
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     * a reply from the user
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats
     * only
     * @param bool|null $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for
     * a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param Filename|Url|string|null $cover Cover for the video in the message. Pass a file_id to send a file that exists on the
     * Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     * to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param int|null $start_timestamp Start timestamp for the video in the message
     * @param int|null $direct_messages_topic_id Identifier of the direct messages topic to which the message will be sent; required
     * if the message is sent to a direct messages chat
     * @param SuggestedPostParameters|null $suggested_post_parameters A JSON-serialized object containing the parameters of the suggested
     * post to send; for direct messages chats only. If the message is sent as a reply to another suggested post, then that suggested
     * post is automatically declined.
     *
     * @see https://core.telegram.org/bots/api#inputfile InputFile
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#suggestedpostparameters SuggestedPostParameters
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardmarkup ReplyKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardremove ReplyKeyboardRemove
     * @see https://core.telegram.org/bots/api#forcereply ForceReply
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     * @see https://core.telegram.org/bots/features#keyboards custom reply keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private Filename|Url|string $video,
        private ?string $business_connection_id = null,
        private ?int $message_thread_id = null,
        private ?int $duration = null,
        private ?int $width = null,
        private ?int $height = null,
        private Filename|Url|string|null $thumbnail = null,
        private ?string $caption = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?array $caption_entities = null,
        private ?bool $has_spoiler = null,
        private ?bool $supports_streaming = null,
        private ?bool $disable_notification = null,
        private ?bool $protect_content = null,
        private ?ReplyParameters $reply_parameters = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ?string $message_effect_id = null,
        private ?bool $show_caption_above_media = null,
        private ?bool $allow_paid_broadcast = null,
        private Filename|Url|string|null $cover = null,
        private ?int $start_timestamp = null,
        private ?int $direct_messages_topic_id = null,
        private ?SuggestedPostParameters $suggested_post_parameters = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendVideoRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getVideo(): Filename|Url|string
    {
        return $this->video;
    }

    public function setVideo(Filename|Url|string $video): SendVideoRequest
    {
        $this->video = $video;
        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): SendVideoRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendVideoRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): SendVideoRequest
    {
        $this->duration = $duration;
        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): SendVideoRequest
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): SendVideoRequest
    {
        $this->height = $height;
        return $this;
    }

    public function getThumbnail(): Filename|Url|string|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Filename|Url|string|null $thumbnail): SendVideoRequest
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): SendVideoRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): SendVideoRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): SendVideoRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getHasSpoiler(): ?bool
    {
        return $this->has_spoiler;
    }

    public function setHasSpoiler(?bool $has_spoiler): SendVideoRequest
    {
        $this->has_spoiler = $has_spoiler;
        return $this;
    }

    public function getSupportsStreaming(): ?bool
    {
        return $this->supports_streaming;
    }

    public function setSupportsStreaming(?bool $supports_streaming): SendVideoRequest
    {
        $this->supports_streaming = $supports_streaming;
        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): SendVideoRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): SendVideoRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): SendVideoRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup): SendVideoRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(?string $message_effect_id): SendVideoRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): SendVideoRequest
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function getAllowPaidBroadcast(): ?bool
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(?bool $allow_paid_broadcast): SendVideoRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function getCover(): Filename|Url|string|null
    {
        return $this->cover;
    }

    public function setCover(Filename|Url|string|null $cover): SendVideoRequest
    {
        $this->cover = $cover;
        return $this;
    }

    public function getStartTimestamp(): ?int
    {
        return $this->start_timestamp;
    }

    public function setStartTimestamp(?int $start_timestamp): SendVideoRequest
    {
        $this->start_timestamp = $start_timestamp;
        return $this;
    }

    public function getDirectMessagesTopicId(): ?int
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(?int $direct_messages_topic_id): SendVideoRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;
        return $this;
    }

    public function getSuggestedPostParameters(): ?SuggestedPostParameters
    {
        return $this->suggested_post_parameters;
    }

    public function setSuggestedPostParameters(?SuggestedPostParameters $suggested_post_parameters): SendVideoRequest
    {
        $this->suggested_post_parameters = $suggested_post_parameters;
        return $this;
    }
}
