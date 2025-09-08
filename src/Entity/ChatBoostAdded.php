<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a service message about a user boosting a chat.
 *
 * @link https://core.telegram.org/bots/api#chatboostadded
 */
final class ChatBoostAdded implements EntityInterface
{
    /**
     * @param int $boost_count Number of boosts added by the user
     */
    public function __construct(
        protected int $boost_count,
    ) {}

    /**
     * @return int
     */
    public function getBoostCount(): int
    {
        return $this->boost_count;
    }

    /**
     * @param int $boost_count
     *
     * @return ChatBoostAdded
     */
    public function setBoostCount(int $boost_count): ChatBoostAdded
    {
        $this->boost_count = $boost_count;
        return $this;
    }
}
