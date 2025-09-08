<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#setchatdescription
 */
class SetChatDescriptionRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param string|null $description New chat description, 0-255 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private ?string $description = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatDescriptionRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): SetChatDescriptionRequest
    {
        $this->description = $description;
        return $this;
    }
}
