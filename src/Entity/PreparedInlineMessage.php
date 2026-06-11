<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a prepared inline message.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#preparedinlinemessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PreparedInlineMessage, Telegram, Bot API, DTO, preparedinlinemessage
// STRUCTURE: ▶ ┌id,result: InlineQueryResult┐ → ∑ PreparedInlineMessage
// region CLASS_PreparedInlineMessage

/**
 * Describes an inline message to be sent by a user of a Mini App.
 *
 * @see https://core.telegram.org/bots/api#preparedinlinemessage
 */
final class PreparedInlineMessage implements EntityInterface
{
    /**
     * @param string $id              Unique identifier of the prepared message
     * @param int    $expiration_date Expiration date of the prepared message, in Unix time. Expired prepared messages can no longer
     *                                be used
     */
    public function __construct(
        protected string $id,
        protected int $expiration_date,
    ) {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return PreparedInlineMessage
     */
    public function setId(string $id): PreparedInlineMessage
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationDate(): int
    {
        return $this->expiration_date;
    }

    /**
     * @param int $expiration_date
     *
     * @return PreparedInlineMessage
     */
    public function setExpirationDate(int $expiration_date): PreparedInlineMessage
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }
}

// endregion CLASS_PreparedInlineMessage
