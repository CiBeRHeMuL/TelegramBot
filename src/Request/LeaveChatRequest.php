<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#leavechat
 */
class LeaveChatRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format
     * \@channelusername). Channel direct messages chats aren't supported; leave the corresponding channel instead.
     */
    public function __construct(
        private ChatId $chat_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): LeaveChatRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }
}
