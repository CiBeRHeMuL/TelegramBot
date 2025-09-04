<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#getchat
 */
class GetChatRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format
     * \@channelusername)
     */
    public function __construct(
        private ChatId $chat_id,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): GetChatRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }
}
