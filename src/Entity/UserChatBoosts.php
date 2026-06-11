<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains a list of boosts a user has applied to a chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#userchatboosts
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UserChatBoosts, Telegram, Bot API, DTO, userchatboosts
// STRUCTURE: ▶ ┌boosts: ChatBoost[]┐ → ∑ UserChatBoosts
// region CLASS_UserChatBoosts

/**
 * This object represents a list of boosts added to a chat by a user.
 *
 * @see https://core.telegram.org/bots/api#userchatboosts
 */
final class UserChatBoosts implements EntityInterface
{
    /**
     * @param ChatBoost[] $boosts The list of boosts added to the chat by the user
     *
     * @see https://core.telegram.org/bots/api#chatboost ChatBoost
     */
    public function __construct(
        #[ArrayType(ChatBoost::class)]
        protected array $boosts,
    ) {}

    /**
     * @return ChatBoost[]
     */
    public function getBoosts(): array
    {
        return $this->boosts;
    }

    /**
     * @param ChatBoost[] $boosts
     *
     * @return UserChatBoosts
     */
    public function setBoosts(array $boosts): UserChatBoosts
    {
        $this->boosts = $boosts;

        return $this;
    }
}

// endregion CLASS_UserChatBoosts
