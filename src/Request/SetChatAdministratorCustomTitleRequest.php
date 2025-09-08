<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#setchatadministratorcustomtitle
 */
class SetChatAdministratorCustomTitleRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername)
     * @param string $custom_title New custom title for the administrator; 0-16 characters, emoji are not allowed
     * @param int $user_id Unique identifier of the target user
     */
    public function __construct(
        private ChatId $chat_id,
        private string $custom_title,
        private int $user_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatAdministratorCustomTitleRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getCustomTitle(): string
    {
        return $this->custom_title;
    }

    public function setCustomTitle(string $custom_title): SetChatAdministratorCustomTitleRequest
    {
        $this->custom_title = $custom_title;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SetChatAdministratorCustomTitleRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
