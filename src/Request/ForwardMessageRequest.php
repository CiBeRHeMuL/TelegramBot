<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\SuggestedPostParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#forwardmessage
 */
class ForwardMessageRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param ChatId $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the
     * format \@channelusername)
     * @param int $message_id Message identifier in the chat specified in from_chat_id
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of a forum; for forum supergroups
     * and private chats of bots with forum topic mode enabled only
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null $protect_content Protects the contents of the forwarded message from forwarding and saving
     * @param int|null $video_start_timestamp New start timestamp for the forwarded video in the message
     * @param int|null $direct_messages_topic_id Identifier of the direct messages topic to which the message will be forwarded;
     * required if the message is forwarded to a direct messages chat
     * @param SuggestedPostParameters|null $suggested_post_parameters A JSON-serialized object containing the parameters of the suggested
     * post to send; for direct messages chats only
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; only available when
     * forwarding to private chats
     *
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/api#suggestedpostparameters SuggestedPostParameters
     */
    public function __construct(
        private ChatId $chat_id,
        private ChatId $from_chat_id,
        private int $message_id,
        private ?int $message_thread_id = null,
        private ?bool $disable_notification = null,
        private ?bool $protect_content = null,
        private ?int $video_start_timestamp = null,
        private ?int $direct_messages_topic_id = null,
        private ?SuggestedPostParameters $suggested_post_parameters = null,
        private ?string $message_effect_id = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): ForwardMessageRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getFromChatId(): ChatId
    {
        return $this->from_chat_id;
    }

    public function setFromChatId(ChatId $from_chat_id): ForwardMessageRequest
    {
        $this->from_chat_id = $from_chat_id;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): ForwardMessageRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): ForwardMessageRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): ForwardMessageRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): ForwardMessageRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getVideoStartTimestamp(): ?int
    {
        return $this->video_start_timestamp;
    }

    public function setVideoStartTimestamp(?int $video_start_timestamp): ForwardMessageRequest
    {
        $this->video_start_timestamp = $video_start_timestamp;
        return $this;
    }

    public function getDirectMessagesTopicId(): ?int
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(?int $direct_messages_topic_id): ForwardMessageRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;
        return $this;
    }

    public function getSuggestedPostParameters(): ?SuggestedPostParameters
    {
        return $this->suggested_post_parameters;
    }

    public function setSuggestedPostParameters(?SuggestedPostParameters $suggested_post_parameters): ForwardMessageRequest
    {
        $this->suggested_post_parameters = $suggested_post_parameters;
        return $this;
    }

    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(?string $message_effect_id): ForwardMessageRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }
}
