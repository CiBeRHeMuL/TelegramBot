<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;
use stdClass;

/**
 * The message was originally sent by an unknown user.
 *
 * @link https://core.telegram.org/bots/api#messageoriginhiddenuser
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::HiddenUser->value))]
final class MessageOriginHiddenUser extends AbstractMessageOrigin
{
    /**
     * @param int $date Date the message was sent originally in Unix time
     * @param string $sender_user_name Name of the user that sent the message originally
     */
    public function __construct(
        protected int $date,
        protected string $sender_user_name,
    ) {
        parent::__construct(MessageOriginTypeEnum::HiddenUser);
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
     * @return MessageOriginHiddenUser
     */
    public function setDate(int $date): MessageOriginHiddenUser
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenderUserName(): string
    {
        return $this->sender_user_name;
    }

    /**
     * @param string $sender_user_name
     *
     * @return MessageOriginHiddenUser
     */
    public function setSenderUserName(string $sender_user_name): MessageOriginHiddenUser
    {
        $this->sender_user_name = $sender_user_name;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'date' => $this->date,
            'sender_user_name' => $this->sender_user_name,
            'type' => $this->type->value,
        ];
    }
}
