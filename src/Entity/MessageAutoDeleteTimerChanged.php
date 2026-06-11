<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a change in auto-delete timer settings.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#messageautodeletetimerchanged
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageAutoDeleteTimerChanged, Telegram, Bot API, DTO, messageautodeletetimerchanged
// STRUCTURE: ▶ ┌message_auto_delete_time┐ → ∑ timer_changed
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
