<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object contains information about a chat boost.
 * @link https://core.telegram.org/bots/api#chatboost
 */
class ChatBoost implements EntityInterface
{
    /**
     * @param string $boost_id Unique identifier of the boost
     * @param int $add_date Point in time (Unix timestamp) when the chat was boosted
     * @param int $expiration_date Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's
     * Telegram Premium subscription is prolonged
     * @param AbstractChatBoostSource $source Source of the added boost
     */
    public function __construct(
        private string $boost_id,
        private int $add_date,
        private int $expiration_date,
        private AbstractChatBoostSource $source,
    ) {
    }

    public function getBoostId(): string
    {
        return $this->boost_id;
    }

    public function setBoostId(string $boost_id): ChatBoost
    {
        $this->boost_id = $boost_id;
        return $this;
    }

    public function getAddDate(): int
    {
        return $this->add_date;
    }

    public function setAddDate(int $add_date): ChatBoost
    {
        $this->add_date = $add_date;
        return $this;
    }

    public function getExpirationDate(): int
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(int $expiration_date): ChatBoost
    {
        $this->expiration_date = $expiration_date;
        return $this;
    }

    public function getSource(): AbstractChatBoostSource
    {
        return $this->source;
    }

    public function setSource(AbstractChatBoostSource $source): ChatBoost
    {
        $this->source = $source;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'boost_id' => $this->boost_id,
            'add_date' => $this->add_date,
            'expiration_date' => $this->expiration_date,
            'source' => $this->source->toArray(),
        ];
    }
}
