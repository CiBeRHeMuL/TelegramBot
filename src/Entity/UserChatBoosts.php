<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents a list of boosts added to a chat by a user.
 * @link https://core.telegram.org/bots/api#userchatboosts
 */
class UserChatBoosts extends AbstractEntity
{
    /**
     * @param ChatBoost[] $boosts The list of boosts added to the chat by the user
     */
    public function __construct(
        #[ArrayType(UserChatBoosts::class)] protected array $boosts,
    ) {
        parent::__construct();
    }

    public function getBoosts(): array
    {
        return $this->boosts;
    }

    public function setBoosts(array $boosts): UserChatBoosts
    {
        $this->boosts = $boosts;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'boosts' => array_map(fn(ChatBoost $e) => $e->toArray(), $this->boosts),
        ];
    }
}
