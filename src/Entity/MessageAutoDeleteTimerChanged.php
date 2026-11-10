<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_MessageAutoDeleteTimerChanged
/**
 * This object represents a service message about a change in auto-delete timer settings.
 *
 * @see https://core.telegram.org/bots/api#messageautodeletetimerchanged
 */
final class MessageAutoDeleteTimerChanged implements EntityInterface
{
    /**
     * @param int $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
     */
    public function __construct(
        protected int $message_auto_delete_time,
    ) {}

    /**
     * @return int
     */
    public function getMessageAutoDeleteTime(): int
    {
        return $this->message_auto_delete_time;
    }

    /**
     * @param int $message_auto_delete_time
     *
     * @return MessageAutoDeleteTimerChanged
     */
    public function setMessageAutoDeleteTime(int $message_auto_delete_time): MessageAutoDeleteTimerChanged
    {
        $this->message_auto_delete_time = $message_auto_delete_time;

        return $this;
    }
}

// endregion CLASS_MessageAutoDeleteTimerChanged
