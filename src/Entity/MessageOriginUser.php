<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;

/**
 * The message was originally sent by a known user.
 *
 * @link https://core.telegram.org/bots/api#messageoriginuser
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::User->value))]
final class MessageOriginUser extends AbstractMessageOrigin
{
    /**
     * @param int $date Date the message was sent originally in Unix time
     * @param User $sender_user User that sent the message originally
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected int $date,
        protected User $sender_user,
    ) {
        parent::__construct(MessageOriginTypeEnum::User);
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return MessageOriginUser
     */
    public function setDate(int $date): MessageOriginUser
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return User
     */
    public function getSenderUser(): User
    {
        return $this->sender_user;
    }

    /**
     * @param User $sender_user
     *
     * @return MessageOriginUser
     */
    public function setSenderUser(User $sender_user): MessageOriginUser
    {
        $this->sender_user = $sender_user;
        return $this;
    }
}
