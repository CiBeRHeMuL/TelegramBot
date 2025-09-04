<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represents a list of boosts added to a chat by a user.
 *
 * @link https://core.telegram.org/bots/api#userchatboosts
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
    ) {
    }

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
