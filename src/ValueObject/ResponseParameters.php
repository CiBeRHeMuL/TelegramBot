<?php

namespace AndrewGos\TelegramBot\ValueObject;

readonly class ResponseParameters
{
    public function __construct(
        private int|null $migrate_to_chat_id,
        private int|null $retry_after,
    ) {
    }

    public function getMigrateToChatId(): int|null
    {
        return $this->migrate_to_chat_id;
    }

    public function getRetryAfter(): int|null
    {
        return $this->retry_after;
    }
}
