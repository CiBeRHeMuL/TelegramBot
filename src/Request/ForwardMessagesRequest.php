<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#forwardmessages
 */
class ForwardMessagesRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param ChatId $from_chat_id Unique identifier for the chat where the original messages were sent (or channel username in the
     * format \@channelusername)
     * @param int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to forward. The
     * identifiers must be specified in a strictly increasing order.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $disable_notification Sends the messages silently. Users will receive a notification with no sound.
     * @param bool|null $protect_content Protects the contents of the forwarded messages from forwarding and saving
     * @param int|null $direct_messages_topic_id Identifier of the direct messages topic to which the messages will be forwarded;
     * required if the messages are forwarded to a direct messages chat
     *
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     */
    public function __construct(
        private ChatId $chat_id,
        private ChatId $from_chat_id,
        private array $message_ids,
        private int|null $message_thread_id = null,
        private bool|null $disable_notification = null,
        private bool|null $protect_content = null,
        private int|null $direct_messages_topic_id = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): ForwardMessagesRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getFromChatId(): ChatId
    {
        return $this->from_chat_id;
    }

    public function setFromChatId(ChatId $from_chat_id): ForwardMessagesRequest
    {
        $this->from_chat_id = $from_chat_id;
        return $this;
    }

    public function getMessageIds(): array
    {
        return $this->message_ids;
    }

    public function setMessageIds(array $message_ids): ForwardMessagesRequest
    {
        $this->message_ids = $message_ids;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): ForwardMessagesRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): ForwardMessagesRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): ForwardMessagesRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getDirectMessagesTopicId(): int|null
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(int|null $direct_messages_topic_id): ForwardMessagesRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'from_chat_id' => $this->from_chat_id->getId(),
            'message_ids' => $this->message_ids,
            'message_thread_id' => $this->message_thread_id,
            'disable_notification' => $this->disable_notification,
            'protect_content' => $this->protect_content,
            'direct_messages_topic_id' => $this->direct_messages_topic_id,
        ];
    }
}
