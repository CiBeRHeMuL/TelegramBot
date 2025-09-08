<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresult result
 * @link https://core.telegram.org/bots/api#choseninlineresult
 */
final class ChosenInlineResult implements EntityInterface
{
    /**
     * @param string $result_id The unique identifier for the result that was chosen
     * @param User $from The user that chose the result
     * @param string $query The query that was used to obtain the result
     * @param string|null $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline
     * keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
     * @param Location|null $location Optional. Sender location, only for bots that require user location
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#location Location
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup inline keyboard
     * @see https://core.telegram.org/bots/api#callbackquery callback queries
     * @see https://core.telegram.org/bots/api#updating-messages edit
     */
    public function __construct(
        protected string $result_id,
        protected User $from,
        protected string $query,
        protected ?string $inline_message_id = null,
        protected ?Location $location = null,
    ) {}

    /**
     * @return string
     */
    public function getResultId(): string
    {
        return $this->result_id;
    }

    /**
     * @param string $result_id
     *
     * @return ChosenInlineResult
     */
    public function setResultId(string $result_id): ChosenInlineResult
    {
        $this->result_id = $result_id;
        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     *
     * @return ChosenInlineResult
     */
    public function setFrom(User $from): ChosenInlineResult
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     *
     * @return ChosenInlineResult
     */
    public function setQuery(string $query): ChosenInlineResult
    {
        $this->query = $query;
        return $this;
    }

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
     * @return ChosenInlineResult
     */
    public function setInlineMessageId(?string $inline_message_id): ChosenInlineResult
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     *
     * @return ChosenInlineResult
     */
    public function setLocation(?Location $location): ChosenInlineResult
    {
        $this->location = $location;
        return $this;
    }
}
