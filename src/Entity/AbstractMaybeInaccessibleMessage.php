<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\AvailableExtensions;

/**
 * This object describes a message that can be inaccessible to the bot
 * @link https://core.telegram.org/bots/api#maybeinaccessiblemessage
 */
#[AvailableExtensions([Message::class, InaccessibleMessage::class])]
abstract class AbstractMaybeInaccessibleMessage implements EntityInterface
{
    public function __construct(
        protected int $date,
    ) {
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): AbstractMaybeInaccessibleMessage
    {
        $this->date = $date;
        return $this;
    }
}
