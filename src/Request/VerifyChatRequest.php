<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#verifychat
 */
class VerifyChatRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername).
     * Channel direct messages chats can't be verified.
     * @param string|null $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization
     * isn't allowed to provide a custom verification description.
     */
    public function __construct(
        private ChatId $chat_id,
        private string|null $custom_description = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): VerifyChatRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getCustomDescription(): string|null
    {
        return $this->custom_description;
    }

    public function setCustomDescription(string|null $custom_description): VerifyChatRequest
    {
        $this->custom_description = $custom_description;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'custom_description' => $this->custom_description,
        ];
    }
}
