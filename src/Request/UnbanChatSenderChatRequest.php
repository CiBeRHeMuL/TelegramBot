<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class UnbanChatSenderChatRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $sender_chat_id Unique identifier of the target sender chat
     */
    public function __construct(
        private ChatId $chat_id,
        private int $sender_chat_id,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): UnbanChatSenderChatRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getSenderChatId(): int
    {
        return $this->sender_chat_id;
    }

    public function setSenderChatId(int $sender_chat_id): UnbanChatSenderChatRequest
    {
        $this->sender_chat_id = $sender_chat_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'sender_chat_id' => $this->sender_chat_id,
        ];
    }
}
