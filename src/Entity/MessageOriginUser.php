<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes the origin of a message forwarded from a user.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#messageoriginuser
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageOriginUser, Telegram, Bot API, DTO, messageoriginuser
// STRUCTURE: ▶ ┌date,sender_user┐ → ∑ origin
// region CLASS_MessageOriginUser

/**
 * The message was originally sent by a known user.
 *
 * @see https://core.telegram.org/bots/api#messageoriginuser
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::User->value))]
final class MessageOriginUser extends AbstractMessageOrigin
{
    /**
     * @param int  $date        Date the message was sent originally in Unix time
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

// endregion CLASS_MessageOriginUser
