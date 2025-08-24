<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InputMediaAudio;
use AndrewGos\TelegramBot\Entity\InputMediaDocument;
use AndrewGos\TelegramBot\Entity\InputMediaPhoto;
use AndrewGos\TelegramBot\Entity\InputMediaVideo;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#sendmediagroup
 */
class SendMediaGroupRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param (InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo)[] $media A JSON-serialized array describing
     * messages to be sent, must include 2-10 items
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param bool|null $disable_notification Sends messages silently. Users will receive a notification with no sound.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $protect_content Protects the contents of the sent messages from forwarding and saving
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats
     * only
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for
     * a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param int|null $direct_messages_topic_id Identifier of the direct messages topic to which the messages will be sent; required
     * if the messages are sent to a direct messages chat
     *
     * @see https://core.telegram.org/bots/api#inputmediaaudio InputMediaAudio
     * @see https://core.telegram.org/bots/api#inputmediadocument InputMediaDocument
     * @see https://core.telegram.org/bots/api#inputmediaphoto InputMediaPhoto
     * @see https://core.telegram.org/bots/api#inputmediavideo InputMediaVideo
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     */
    public function __construct(
        private ChatId $chat_id,
        private array $media,
        private string|null $business_connection_id = null,
        private bool|null $disable_notification = null,
        private int|null $message_thread_id = null,
        private bool|null $protect_content = null,
        private ReplyParameters|null $reply_parameters = null,
        private string|null $message_effect_id = null,
        private bool|null $allow_paid_broadcast = null,
        private int|null $direct_messages_topic_id = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendMediaGroupRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMedia(): array
    {
        return $this->media;
    }

    public function setMedia(array $media): SendMediaGroupRequest
    {
        $this->media = $media;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendMediaGroupRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendMediaGroupRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendMediaGroupRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendMediaGroupRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendMediaGroupRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getMessageEffectId(): string|null
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(string|null $message_effect_id): SendMediaGroupRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): SendMediaGroupRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function getDirectMessagesTopicId(): int|null
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(int|null $direct_messages_topic_id): SendMediaGroupRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'media' => array_map(fn(InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo $e) => $e->toArray(), $this->media),
            'business_connection_id' => $this->business_connection_id,
            'disable_notification' => $this->disable_notification,
            'message_thread_id' => $this->message_thread_id,
            'protect_content' => $this->protect_content,
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'message_effect_id' => $this->message_effect_id,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
            'direct_messages_topic_id' => $this->direct_messages_topic_id,
        ];
    }
}
