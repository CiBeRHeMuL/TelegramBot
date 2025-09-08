<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#deletechatstickerset
 */
class DeleteChatStickerSetRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername)
     */
    public function __construct(
        private ChatId $chat_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeleteChatStickerSetRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }
}
