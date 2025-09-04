<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#setchattitle
 */
class SetChatTitleRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param string $title New chat title, 1-128 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private string $title,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatTitleRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): SetChatTitleRequest
    {
        $this->title = $title;
        return $this;
    }
}
