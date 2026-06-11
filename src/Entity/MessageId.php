<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a unique message identifier.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#messageid
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageId, Telegram, Bot API, DTO, messageid
// STRUCTURE: ▶ ┌message_id┐ → ∑ MessageId
// region CLASS_MessageId

/**
 * This object represents a unique message identifier.
 *
 * @see https://core.telegram.org/bots/api#messageid
 */
final class MessageId implements EntityInterface
{
    /**
     * @param int $message_id Unique message identifier. In specific instances (e.g., message containing a video sent to a big chat),
     *                        the server might automatically schedule a message instead of sending it immediately. In such cases, this field will be 0 and
     *                        the relevant message will be unusable until it is actually sent
     */
    public function __construct(
        protected int $message_id,
    ) {}

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

// endregion CLASS_MessageId
