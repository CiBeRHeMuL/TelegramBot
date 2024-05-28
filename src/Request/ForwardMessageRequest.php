<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class ForwardMessageRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel.
     * @param ChatId $from_chat_id Unique identifier for the chat where the original message was sent from.
     * @param int $message_id Message identifier in the chat specified in from_chat_id.
     * @param int|null $message_thread_id Unique identifier for the target message thread (for supergroups and channels).
     * @param bool|null $disable_notification Flag for sending the message silently. Users will receive a notification without sound.
     * @param bool|null $protect_content Flag to protect the content of the forwarded message from being forwarded and saved.
     */
    public function __construct(
        private ChatId $chat_id,
        private ChatId $from_chat_id,
        private int $message_id,
        private int|null $message_thread_id = null,
        private bool|null $disable_notification = null,
        private bool|null $protect_content = null,
    ) {
    }

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

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): ForwardMessageRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): ForwardMessageRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): ForwardMessageRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_thread_id' => $this->message_thread_id,
            'from_chat_id' => $this->from_chat_id->getId(),
            'disable_notification' => $this->disable_notification,
            'protect_content' => $this->protect_content,
            'message_id' => $this->message_id,
        ];
    }
}
