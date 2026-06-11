<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteAllMessageReactions method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deleteallmessagereactions
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, All, Message, Reactions
// STRUCTURE: ▶ ┌chat_id + actor_chat_id + user_id┐ → ◇ construct → ⊕ → ∑ ⟦DeleteAllMessageReactionsRequest⟧

// region CLASS_DeleteAllMessageReactionsRequest
/**
 * @see https://core.telegram.org/bots/api#deleteallmessagereactions
 */
class DeleteAllMessageReactionsRequest implements RequestInterface
{
    /**
     * @param ChatId   $chat_id       Unique identifier for the target chat or username of the target supergroup (in the format \@username)
     * @param int|null $actor_chat_id Identifier of the chat whose reactions will be removed, if the reactions were added by a chat
     * @param int|null $user_id       Identifier of the user whose reactions will be removed, if the reactions were added by a user
     */
    public function __construct(
        private ChatId $chat_id,
        private ?int $actor_chat_id = null,
        private ?int $user_id = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeleteAllMessageReactionsRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getActorChatId(): ?int
    {
        return $this->actor_chat_id;
    }

    public function setActorChatId(?int $actor_chat_id): DeleteAllMessageReactionsRequest
    {
        $this->actor_chat_id = $actor_chat_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): DeleteAllMessageReactionsRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_DeleteAllMessageReactionsRequest
