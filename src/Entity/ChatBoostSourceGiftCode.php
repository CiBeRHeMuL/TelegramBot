<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatBoostSourceEnum;
use stdClass;

/**
 * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat.
 * Each such code boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 * @link https://core.telegram.org/bots/api#chatboostsourcegiftcode
 */
#[BuildIf(new FieldIsChecker('source', ChatBoostSourceEnum::GiftCode->value))]
class ChatBoostSourceGiftCode extends AbstractChatBoostSource
{
    /**
     * @param User $user User for which the gift code was created
     */
    public function __construct(
        private User $user,
    ) {
        parent::__construct(ChatBoostSourceEnum::GiftCode);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): ChatBoostSourceGiftCode
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
