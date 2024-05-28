<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class CopyMessagesRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername).
     * @param ChatId $from_chat_id Unique identifier for the chat where the original messages were sent
     * (or channel username in the format @channelusername).
     * @param int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to copy.
     * The identifiers must be specified in a strictly increasing order.
     * @param bool|null $disable_notification Sends the messages silently. Users will receive a notification with no sound.
     * @param bool|null $remove_caption Pass True to copy the messages without their captions.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only.
     * @param bool|null $protect_content Protects the contents of the sent messages from forwarding and saving.
     */
    public function __construct(
        private ChatId $chat_id,
        private ChatId $from_chat_id,
        private array $message_ids,
        private bool|null $disable_notification = null,
        private bool|null $remove_caption = null,
        private int|null $message_thread_id = null,
        private bool|null $protect_content = null
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): CopyMessagesRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getFromChatId(): ChatId
    {
        return $this->from_chat_id;
    }

    public function setFromChatId(ChatId $from_chat_id): CopyMessagesRequest
    {
        $this->from_chat_id = $from_chat_id;
        return $this;
    }

    public function getMessageIds(): array
    {
        return $this->message_ids;
    }

    public function setMessageIds(array $message_ids): CopyMessagesRequest
    {
        $this->message_ids = $message_ids;
        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): CopyMessagesRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getRemoveCaption(): ?bool
    {
        return $this->remove_caption;
    }

    public function setRemoveCaption(?bool $remove_caption): CopyMessagesRequest
    {
        $this->remove_caption = $remove_caption;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): CopyMessagesRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): CopyMessagesRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'from_chat_id' => $this->from_chat_id->getId(),
            'message_ids' => $this->message_ids,
            'disable_notification' => $this->disable_notification,
            'remove_caption' => $this->remove_caption,
            'message_thread_id' => $this->message_thread_id,
            'protect_content' => $this->protect_content,
        ];
    }
}
