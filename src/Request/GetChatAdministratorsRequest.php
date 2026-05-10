<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#getchatadministrators
 */
class GetChatAdministratorsRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup or channel in the format
     * \@username
     * @param bool|null $return_bots Pass True to additionally receive all bots that are administrators of the chat. By default,
     * bots other than the current bot are omitted.
     */
    public function __construct(
        private ChatId $chat_id,
        private ?bool $return_bots = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): GetChatAdministratorsRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getReturnBots(): ?bool
    {
        return $this->return_bots;
    }

    public function setReturnBots(?bool $return_bots): GetChatAdministratorsRequest
    {
        $this->return_bots = $return_bots;
        return $this;
    }
}
