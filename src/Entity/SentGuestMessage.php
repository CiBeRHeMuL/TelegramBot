<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about a guest message sent via a bot.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#sentguestmessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SentGuestMessage, Telegram, Bot API, DTO, sentguestmessage
// STRUCTURE: ▶ ┌result: Message,guest_user_id┐ → ∑ SentGuestMessage
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
