<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a unique message identifier.
 *
 * @link https://core.telegram.org/bots/api#messageid
 */
final class MessageId implements EntityInterface
{
    /**
     * @param int $message_id Unique message identifier. In specific instances (e.g., message containing a video sent to a big chat),
     * the server might automatically schedule a message instead of sending it immediately. In such cases, this field will be 0 and
     * the relevant message will be unusable until it is actually sent
     */
    public function __construct(
        protected int $message_id,
    ) {
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $message_id
     *
     * @return MessageId
     */
    public function setMessageId(int $message_id): MessageId
    {
        $this->message_id = $message_id;
        return $this;
    }
}
