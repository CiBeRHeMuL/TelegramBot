<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about a sent Web App message.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#sentwebappmessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SentWebAppMessage, Telegram, Bot API, DTO, sentwebappmessage
// STRUCTURE: ▶ ◇ inline_message_id → ∑ result
// region CLASS_SentWebAppMessage

/**
 * Describes an inline message sent by a Web App on behalf of a user.
 *
 * @see https://core.telegram.org/bots/webapps Web App
 * @see https://core.telegram.org/bots/api#sentwebappmessage
 */
final class SentWebAppMessage implements EntityInterface
{
    /**
     * @param string|null $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline
     *                                       keyboard attached to the message.
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup inline keyboard
     */
    public function __construct(
        protected ?string $inline_message_id = null,
    ) {}

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    /**
     * @param string|null $inline_message_id
     *
     * @return SentWebAppMessage
     */
    public function setInlineMessageId(?string $inline_message_id): SentWebAppMessage
    {
        $this->inline_message_id = $inline_message_id;

        return $this;
    }
}

// endregion CLASS_SentWebAppMessage
