<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class SetChatStickerSetRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername)
     * @param string $sticker_set_name Name of the sticker set to be set as the group sticker set
     */
    public function __construct(
        private ChatId $chat_id,
        private string $sticker_set_name,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatStickerSetRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getStickerSetName(): string
    {
        return $this->sticker_set_name;
    }

    public function setStickerSetName(string $sticker_set_name): SetChatStickerSetRequest
    {
        $this->sticker_set_name = $sticker_set_name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'sticker_set_name' => $this->sticker_set_name,
        ];
    }
}
