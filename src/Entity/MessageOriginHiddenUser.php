<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;
use stdClass;

/**
 * The message was originally sent by an unknown user.
 * @link https://core.telegram.org/bots/api#messageoriginhiddenuser
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::HiddenUser->value))]
class MessageOriginHiddenUser extends AbstractMessageOrigin
{
    /**
     * @param int $date
     * @param string $sender_user_name Name of the user that sent the message originally
     */
    public function __construct(
        protected int $date,
        protected string $sender_user_name,
    ) {
        parent::__construct(MessageOriginTypeEnum::HiddenUser);
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): MessageOriginHiddenUser
    {
        $this->date = $date;
        return $this;
    }

    public function getSenderUserName(): string
    {
        return $this->sender_user_name;
    }

    public function setSenderUserName(string $sender_user_name): MessageOriginHiddenUser
    {
        $this->sender_user_name = $sender_user_name;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'date' => $this->date,
            'sender_user_name' => $this->sender_user_name,
        ];
    }
}
