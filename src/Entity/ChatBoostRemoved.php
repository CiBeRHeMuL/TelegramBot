<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a boost removed from a chat.
 * @link https://core.telegram.org/bots/api#chatboostremoved
 */
class ChatBoostRemoved extends AbstractEntity
{
    /**
     * @param Chat $chat Chat which was boosted
     * @param string $boost_id Unique identifier of the boost
     * @param int $remove_date Point in time (Unix timestamp) when the boost was removed
     * @param AbstractChatBoostSource $source Source of the removed boost
     */
    public function __construct(
        protected Chat $chat,
        protected string $boost_id,
        protected int $remove_date,
        protected AbstractChatBoostSource $source,
    ) {
        parent::__construct();
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): ChatBoostRemoved
    {
        $this->chat = $chat;
        return $this;
    }

    public function getBoostId(): string
    {
        return $this->boost_id;
    }

    public function setBoostId(string $boost_id): ChatBoostRemoved
    {
        $this->boost_id = $boost_id;
        return $this;
    }

    public function getRemoveDate(): int
    {
        return $this->remove_date;
    }

    public function setRemoveDate(int $remove_date): ChatBoostRemoved
    {
        $this->remove_date = $remove_date;
        return $this;
    }

    public function getSource(): AbstractChatBoostSource
    {
        return $this->source;
    }

    public function setSource(AbstractChatBoostSource $source): ChatBoostRemoved
    {
        $this->source = $source;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'boost_id' => $this->boost_id,
            'remove_date' => $this->remove_date,
            'source' => $this->source->toArray(),
        ];
    }
}
