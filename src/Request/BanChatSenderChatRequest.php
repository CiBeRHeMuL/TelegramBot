<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class BanChatSenderChatRequest implements RequestInterface
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

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'sender_chat_id' => $this->sender_chat_id,
        ];
    }
}
