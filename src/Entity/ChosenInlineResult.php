<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * Note: It is necessary to enable inline feedback via \@BotFather in order to receive these objects in updates.
 * @link https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends AbstractEntity
{
    /**
     * @param string $result_id The unique identifier for the result that was chosen
     * @param User $from The user that chose the result
     * @param string $query The query that was used to obtain the result
     * @param string|null $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline
     * keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
     * @param Location|null $location Optional. Sender location, only for bots that require user location
     */
    public function __construct(
        protected string $result_id,
        protected User $from,
        protected string $query,
        protected string|null $inline_message_id = null,
        protected Location|null $location = null,
    ) {
        parent::__construct();
    }

    public function getResultId(): string
    {
        return $this->result_id;
    }

    public function setResultId(string $result_id): ChosenInlineResult
    {
        $this->result_id = $result_id;
        return $this;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function setFrom(User $from): ChosenInlineResult
    {
        $this->from = $from;
        return $this;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function setQuery(string $query): ChosenInlineResult
    {
        $this->query = $query;
        return $this;
    }

    public function getInlineMessageId(): string|null
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(string|null $inline_message_id): ChosenInlineResult
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getLocation(): Location|null
    {
        return $this->location;
    }

    public function setLocation(Location|null $location): ChosenInlineResult
    {
        $this->location = $location;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'result_id' => $this->result_id,
            'from' => $this->from->toArray(),
            'query' => $this->query,
            'inline_message_id' => $this->inline_message_id,
            'location' => $this->location?->toArray(),
        ];
    }
}
