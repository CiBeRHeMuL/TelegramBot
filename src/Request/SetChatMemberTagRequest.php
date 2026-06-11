<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setChatMemberTag method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setchatmembertag
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Chat, Member, Tag
// STRUCTURE: ▶ ┌chat_id + user_id + tag┐ → ◇ construct → ⊕ → ∑ ⟦SetChatMemberTagRequest⟧

// region CLASS_SetChatMemberTagRequest
/**
 * @see https://core.telegram.org/bots/api#setchatmembertag
 */
class SetChatMemberTagRequest implements RequestInterface
{
    /**
     * @param ChatId      $chat_id Unique identifier for the target chat or username of the target supergroup in the format \@username
     * @param int         $user_id Unique identifier of the target user
     * @param string|null $tag     New tag for the member; 0-16 characters, emoji are not allowed
     */
    public function __construct(
        private ChatId $chat_id,
        private int $user_id,
        private ?string $tag = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatMemberTagRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SetChatMemberTagRequest
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(?string $tag): SetChatMemberTagRequest
    {
        $this->tag = $tag;

        return $this;
    }
}
// endregion CLASS_SetChatMemberTagRequest
