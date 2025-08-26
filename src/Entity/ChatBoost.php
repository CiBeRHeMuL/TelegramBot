<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object contains information about a chat boost.
 *
 * @link https://core.telegram.org/bots/api#chatboost
 */
final class ChatBoost implements EntityInterface
{
    /**
     * @param string $boost_id Unique identifier of the boost
     * @param int $add_date Point in time (Unix timestamp) when the chat was boosted
     * @param int $expiration_date Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's
     * Telegram Premium subscription is prolonged
     * @param AbstractChatBoostSource $source Source of the added boost
     *
     * @see https://core.telegram.org/bots/api#chatboostsource ChatBoostSource
     */
    public function __construct(
        protected string $boost_id,
        protected int $add_date,
        protected int $expiration_date,
        protected AbstractChatBoostSource $source,
    ) {
    }

    /**
     * @return string
     */
    public function getBoostId(): string
    {
        return $this->boost_id;
    }

    /**
     * @param string $boost_id
     *
     * @return ChatBoost
     */
    public function setBoostId(string $boost_id): ChatBoost
    {
        $this->boost_id = $boost_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getAddDate(): int
    {
        return $this->add_date;
    }

    /**
     * @param int $add_date
     *
     * @return ChatBoost
     */
    public function setAddDate(int $add_date): ChatBoost
    {
        $this->add_date = $add_date;
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
     * @return ChatBoost
     */
    public function setExpirationDate(int $expiration_date): ChatBoost
    {
        $this->expiration_date = $expiration_date;
        return $this;
    }

    /**
     * @return AbstractChatBoostSource
     */
    public function getSource(): AbstractChatBoostSource
    {
        return $this->source;
    }

    /**
     * @param AbstractChatBoostSource $source
     *
     * @return ChatBoost
     */
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
