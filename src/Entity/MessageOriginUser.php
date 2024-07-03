<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;
use stdClass;

/**
 * The message was originally sent by a known user.
 * @link https://core.telegram.org/bots/api#messageoriginuser
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::User->value))]
class MessageOriginUser extends AbstractMessageOrigin
{
    /**
     * @param int $date
     * @param User $sender_user User that sent the message originally
     */
    public function __construct(
        protected int $date,
        protected User $sender_user,
    ) {
        parent::__construct(MessageOriginTypeEnum::User);
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): MessageOriginUser
    {
        $this->date = $date;
        return $this;
    }

    public function getSenderUser(): User
    {
        return $this->sender_user;
    }

    public function setSenderUser(User $sender_user): MessageOriginUser
    {
        $this->sender_user = $sender_user;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'date' => $this->date,
            'sender_user' => $this->sender_user->toArray(),
        ];
    }
}
