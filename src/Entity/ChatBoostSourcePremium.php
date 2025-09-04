<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatBoostSourceEnum;

/**
 * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 *
 * @link https://core.telegram.org/bots/api#chatboostsourcepremium
 */
#[BuildIf(new FieldIsChecker('source', ChatBoostSourceEnum::Premium->value))]
final class ChatBoostSourcePremium extends AbstractChatBoostSource
{
    /**
     * @param User $user User that boosted the chat
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
    ) {
        parent::__construct(ChatBoostSourceEnum::Premium);
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return ChatBoostSourcePremium
     */
    public function setUser(User $user): ChatBoostSourcePremium
    {
        $this->user = $user;
        return $this;
    }
}
