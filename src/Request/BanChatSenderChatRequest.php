<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#banchatsenderchat
 */
class BanChatSenderChatRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param int $sender_chat_id Unique identifier of the target sender chat
     */
    public function __construct(
        private ChatId $chat_id,
        private int $sender_chat_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): BanChatSenderChatRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getSenderChatId(): int
    {
        return $this->sender_chat_id;
    }

    public function setSenderChatId(int $sender_chat_id): BanChatSenderChatRequest
    {
        $this->sender_chat_id = $sender_chat_id;
        return $this;
    }
}
