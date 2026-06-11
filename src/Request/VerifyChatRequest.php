<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API verifyChat method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#verifychat
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Verify, Chat
// STRUCTURE: ▶ ┌chat_id + custom_description┐ → ◇ construct → ⊕ → ∑ ⟦VerifyChatRequest⟧

// region CLASS_VerifyChatRequest
/**
 * @see https://core.telegram.org/bots/api#verifychat
 */
class VerifyChatRequest implements RequestInterface
{
    /**
     * @param ChatId      $chat_id            Unique identifier for the target chat or username of the target bot, supergroup or channel in the format
     *                                        \@username. Channel direct messages chats can't be verified.
     * @param string|null $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization
     *                                        isn't allowed to provide a custom verification description.
     */
    public function __construct(
        private ChatId $chat_id,
        private ?string $custom_description = null,
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
}
// endregion CLASS_VerifyChatRequest
