<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\ChatTypeEnum;
use stdClass;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or
 * trending results.
 * @link https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery extends AbstractEntity
{
    /**
     * @param string $id Unique identifier for this query
     * @param User $from Sender
     * @param string $query Text of the query (up to 256 characters)
     * @param string $offset Offset of the results to be returned, can be controlled by the bot
     * @param ChatTypeEnum|null $chat_type Optional. Type of the chat from which the inline query was sent. Can be either “sender”
     * for a protected chat with the inline query sender, “protected”, “group”, “supergroup”, or “channel”. The chat
     * type should be always known for requests sent from official clients and most third-party clients, unless the request was sent
     * from a secret chat
     * @param Location|null $location Optional. Sender location, only for bots that request user location
     */
    public function __construct(
        protected string $id,
        protected User $from,
        protected string $query,
        protected string $offset,
        protected ChatTypeEnum|null $chat_type = null,
        protected Location|null $location = null,
    ) {
        parent::__construct();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQuery
    {
        $this->id = $id;
        return $this;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function setFrom(User $from): InlineQuery
    {
        $this->from = $from;
        return $this;
    }

    public function getQuery(): string
    {
        return $this->query;
    }

    public function setQuery(string $query): InlineQuery
    {
        $this->query = $query;
        return $this;
    }

    public function getOffset(): string
    {
        return $this->offset;
    }

    public function setOffset(string $offset): InlineQuery
    {
        $this->offset = $offset;
        return $this;
    }

    public function getChatType(): ChatTypeEnum|null
    {
        return $this->chat_type;
    }

    public function setChatType(ChatTypeEnum|null $chat_type): InlineQuery
    {
        $this->chat_type = $chat_type;
        return $this;
    }

    public function getLocation(): Location|null
    {
        return $this->location;
    }

    public function setLocation(Location|null $location): InlineQuery
    {
        $this->location = $location;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'from' => $this->from->toArray(),
            'query' => $this->query,
            'offset' => $this->offset,
            'chat_type' => $this->chat_type,
            'location' => $this->location?->toArray(),
        ];
    }
}
