<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#getchatmenubutton
 */
class GetChatMenuButtonRequest implements RequestInterface
{
    /**
     * @param ChatId|null $chat_id Unique identifier for the target private chat. If not specified, default bot's menu button will
     * be returned
     */
    public function __construct(
        private ChatId|null $chat_id = null,
    ) {
    }

    public function getChatId(): ChatId|null
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId|null $chat_id): GetChatMenuButtonRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }
}
