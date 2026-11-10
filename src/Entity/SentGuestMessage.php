<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_SentGuestMessage
/**
 * Describes an inline message sent by a guest bot.
 *
 * @see https://core.telegram.org/bots/api#sentguestmessage
 */
final class SentGuestMessage implements EntityInterface
{
    /**
     * @param string $inline_message_id Identifier of the sent inline message
     */
    public function __construct(
        protected string $inline_message_id,
    ) {}

    /**
     * @return string
     */
    public function getInlineMessageId(): string
    {
        return $this->inline_message_id;
    }

    /**
     * @param string $inline_message_id
     *
     * @return SentGuestMessage
     */
    public function setInlineMessageId(string $inline_message_id): SentGuestMessage
    {
        $this->inline_message_id = $inline_message_id;

        return $this;
    }
}

// endregion CLASS_SentGuestMessage
