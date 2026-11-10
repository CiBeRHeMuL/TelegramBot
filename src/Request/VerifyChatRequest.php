<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region CLASS_VerifyChatRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#verifychat
 */
class VerifyChatRequest implements RequestInterface
{
    /**
     * @param ChatId                     $chat_id                       Unique identifier for the target chat or username of the target bot, supergroup, or channel in the
     *                                                                  format \@username. Channel direct messages chats can't be verified.
     * @param string|null                $custom_description            Custom description for the verification; 0-70 characters. Must be empty if the organization
     *                                                                  isn't allowed to provide a custom verification description.
     * @param TelegramParseModeEnum|null $custom_description_parse_mode Mode for parsing entities in the custom description. See
     *                                                                  formatting options for more details. Only “text_link” entities are supported.
     * @param MessageEntity[]|null       $custom_description_entities   A JSON-serialized list of special entities that appear in the custom
     *                                                                  description, which can be specified instead of custom_description_parse_mode. Only “text_link” entities are supported.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        private ChatId $chat_id,
        private ?string $custom_description = null,
        private ?TelegramParseModeEnum $custom_description_parse_mode = null,
        private ?array $custom_description_entities = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): VerifyChatRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getCustomDescription(): ?string
    {
        return $this->custom_description;
    }

    public function setCustomDescription(?string $custom_description): VerifyChatRequest
    {
        $this->custom_description = $custom_description;

        return $this;
    }

    public function getCustomDescriptionParseMode(): ?TelegramParseModeEnum
    {
        return $this->custom_description_parse_mode;
    }

    public function setCustomDescriptionParseMode(?TelegramParseModeEnum $custom_description_parse_mode): VerifyChatRequest
    {
        $this->custom_description_parse_mode = $custom_description_parse_mode;

        return $this;
    }

    public function getCustomDescriptionEntities(): ?array
    {
        return $this->custom_description_entities;
    }

    public function setCustomDescriptionEntities(?array $custom_description_entities): VerifyChatRequest
    {
        $this->custom_description_entities = $custom_description_entities;

        return $this;
    }
}
// endregion CLASS_VerifyChatRequest
