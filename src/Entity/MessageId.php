<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a unique message identifier.
 * @link https://core.telegram.org/bots/api#messageid
 */
class MessageId implements EntityInterface
{
    /**
     * @param int $message_id Unique message identifier
     */
    public function __construct(
        private int $message_id,
    ) {
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): MessageId
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return ['message_id' => $this->message_id];
    }
}
