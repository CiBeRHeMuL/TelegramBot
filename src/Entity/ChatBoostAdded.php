<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a user boosting a chat.
 * @link https://core.telegram.org/bots/api#chatboostadded
 */
class ChatBoostAdded extends AbstractEntity
{
    /**
     * @param int $boost_count Number of boosts added by the user
     */
    public function __construct(
        protected int $boost_count,
    ) {
        parent::__construct();
    }

    public function getBoostCount(): int
    {
        return $this->boost_count;
    }

    public function setBoostCount(int $boost_count): ChatBoostAdded
    {
        $this->boost_count = $boost_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'boost_count' => $this->boost_count,
        ];
    }
}
