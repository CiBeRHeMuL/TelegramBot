<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\EphemeralMessageParameters;
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

// region CLASS_SendAudioRequest
class SendAudioRequest implements RequestInterface
{
    /**
     * @param ChatId                                                                       $chat_id                      Unique identifier for the target chat or username of the target channel (in the format
     * @param string|Filename|Url                                                          $audio                        Audio file to send. Pass a file_id as String to send an audio file that exists on
     *                                                                                                                   the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the
     *                                                                                                                   Internet, or upload a new one using multipart/form-data.
     * @param string|null                                                                  $business_connection_id       unique identifier of the business connection on behalf of which the
     *                                                                                                                   message will be sent
     * @param int|null                                                                     $message_thread_id            unique identifier for the target message thread (topic) of the forum; for forum
     *                                                                                                                   supergroups only
     * @param string|null                                                                  $caption                      audio caption, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null                                                   $parse_mode                   Mode for parsing entities in the audio caption. See formatting options for more
     *                                                                                                                   details.
     * @param MessageEntity[]|null                                                         $caption_entities             a JSON-serialized list of special entities that appear in the caption, which
     *                                                                                                                   can be specified instead of parse_mode
     * @param int|null                                                                     $duration                     duration of the audio in seconds
     * @param string|null                                                                  $performer                    performer
     * @param string|null                                                                  $title                        track name
     * @param string|Filename|Url|null                                                     $thumbnail                    Thumbnail of the file sent; can be ignored if thumbnail generation for the
     *                                                                                                                   file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                                                                                                                   width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails
     *                                                                                                                   can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the
     *                                                                                                                   thumbnail was uploaded using multipart/form-data under <file_attach_name>.
     * @param bool|null                                                                    $disable_notification         Sends the message silently. Users will receive a notification with no
     *                                                                                                                   sound.
     * @param bool|null                                                                    $protect_content              protects the contents of the sent message from forwarding and saving
     * @param ReplyParameters|null                                                         $reply_parameters             description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup                 Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions
     *                                                                                                                   to remove a reply keyboard or to force a reply from the user.
     * @param string|null                                                                  $message_effect_id            Unique identifier of the message effect to be added to the message; for private chats only
     * @param bool|null                                                                    $allow_paid_broadcast         Pass True to allow up to 1000 messages per second,
     *                                                                                                                   ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param int|null                                                                     $direct_messages_topic_id     Identifier of the direct messages topic to which the message will be sent; required if the message is sent to a direct messages chat
     * @param SuggestedPostParameters|null                                                 $suggested_post_parameters    A JSON-serialized object containing the parameters of the suggested post to send; for direct messages chats only. If the message is sent as a reply to another suggested post, then that suggested post is automatically declined.
     * @param EphemeralMessageParameters|null                                              $ephemeral_message_parameters Optional. A JSON-serialized object containing the parameters of the ephemeral message
     *
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     */
    public function __construct(
        private ChatId $chat_id,
        private string|Filename|Url $audio,
        private ?string $business_connection_id = null,
        private ?int $message_thread_id = null,
        private ?string $caption = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?array $caption_entities = null,
        private ?int $duration = null,
        private ?string $performer = null,
        private ?string $title = null,
        private string|Filename|Url|null $thumbnail = null,
        private ?bool $disable_notification = null,
        private ?bool $protect_content = null,
        private ?ReplyParameters $reply_parameters = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ?string $message_effect_id = null,
        private ?bool $allow_paid_broadcast = null,
        private ?int $direct_messages_topic_id = null,
        private ?SuggestedPostParameters $suggested_post_parameters = null,
        private ?EphemeralMessageParameters $ephemeral_message_parameters = null,
    ) {}

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

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): SendAudioRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendAudioRequest
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): SendAudioRequest
    {
        $this->caption = $caption;

        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): SendAudioRequest
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): SendAudioRequest
    {
        $this->caption_entities = $caption_entities;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): SendAudioRequest
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    public function setPerformer(?string $performer): SendAudioRequest
    {
        $this->performer = $performer;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): SendAudioRequest
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

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): SendAudioRequest
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): SendAudioRequest
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): SendAudioRequest
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

    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(?string $message_effect_id): SendAudioRequest
    {
        $this->message_effect_id = $message_effect_id;

        return $this;
    }

    public function getAllowPaidBroadcast(): ?bool
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(?bool $allow_paid_broadcast): SendAudioRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;

        return $this;
    }

    public function getDirectMessagesTopicId(): ?int
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(?int $direct_messages_topic_id): SendAudioRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;

        return $this;
    }

    public function getSuggestedPostParameters(): ?SuggestedPostParameters
    {
        return $this->suggested_post_parameters;
    }

    public function setSuggestedPostParameters(?SuggestedPostParameters $suggested_post_parameters): SendAudioRequest
    {
        $this->suggested_post_parameters = $suggested_post_parameters;

        return $this;
    }

    /**
     * @return EphemeralMessageParameters|null
     */
    public function getEphemeralMessageParameters(): ?EphemeralMessageParameters
    {
        return $this->ephemeral_message_parameters;
    }

    /**
     * @param EphemeralMessageParameters|null $ephemeral_message_parameters
     *
     * @return SendAudioRequest
     */
    public function setEphemeralMessageParameters(?EphemeralMessageParameters $ephemeral_message_parameters): SendAudioRequest
    {
        $this->ephemeral_message_parameters = $ephemeral_message_parameters;

        return $this;
    }
}
// endregion CLASS_SendAudioRequest
