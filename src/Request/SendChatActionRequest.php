<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Enum\ChatActionEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class SendChatActionRequest implements RequestInterface
{
    /**
     * @param ChatActionEnum $action Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for
     * text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes,
     * upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note
     * for video notes.
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the action will
     * be sent
     * @param int|null $message_thread_id Unique identifier for the target message thread; for supergroups only
     */
    public function __construct(
        private ChatActionEnum $action,
        private ChatId $chat_id,
        private ?string $business_connection_id = null,
        private ?int $message_thread_id = null,
    ) {}

    public function getAction(): ChatActionEnum
    {
        return $this->action;
    }

    public function setAction(ChatActionEnum $action): SendChatActionRequest
    {
        $this->action = $action;
        return $this;
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendChatActionRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): SendChatActionRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendChatActionRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }
}
