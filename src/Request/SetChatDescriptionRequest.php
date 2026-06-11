<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setChatDescription method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setchatdescription
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Chat, Description
// STRUCTURE: ▶ ┌chat_id + description┐ → ◇ construct → ⊕ → ∑ ⟦SetChatDescriptionRequest⟧

// region CLASS_SetChatDescriptionRequest
/**
 * @see https://core.telegram.org/bots/api#setchatdescription
 */
class SetChatDescriptionRequest implements RequestInterface
{
    /**
     * @param ChatId      $chat_id     Unique identifier for the target chat or username of the target channel in the format \@username
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
// endregion CLASS_SetChatDescriptionRequest
