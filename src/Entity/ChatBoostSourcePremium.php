<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatBoostSourceEnum;
use stdClass;

/**
 * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium subscription to another user.
 * @link https://core.telegram.org/bots/api#chatboostsourcepremium
 */
#[BuildIf(new FieldIsChecker('source', ChatBoostSourceEnum::Premium->value))]
class ChatBoostSourcePremium extends AbstractChatBoostSource
{
    /**
     * @param User $user User that boosted the chat
     */
    public function __construct(
        private User $user,
    ) {
        parent::__construct(ChatBoostSourceEnum::Premium);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): ChatBoostSourcePremium
    {
        $this->user = $user;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'source' => $this->source->value,
            'user' => $this->user->toArray(),
        ];
    }
}
