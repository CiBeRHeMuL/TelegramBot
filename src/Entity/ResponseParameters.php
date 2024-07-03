<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes why a request was unsuccessful.
 * @link https://core.telegram.org/bots/api#responseparameters
 */
class ResponseParameters extends AbstractEntity
{
    /**
     * @param int|null $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This
     * number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting
     * it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     * this identifier.
     * @param int|null $retry_after Optional. In case of exceeding flood control, the number of seconds left to wait before the request
     * can be repeated
     */
    public function __construct(
        protected int|null $migrate_to_chat_id = null,
        protected int|null $retry_after = null,
    ) {
        parent::__construct();
    }

    public function getMigrateToChatId(): int|null
    {
        return $this->migrate_to_chat_id;
    }

    public function setMigrateToChatId(int|null $migrate_to_chat_id): ResponseParameters
    {
        $this->migrate_to_chat_id = $migrate_to_chat_id;
        return $this;
    }

    public function getRetryAfter(): int|null
    {
        return $this->retry_after;
    }

    public function setRetryAfter(int|null $retry_after): ResponseParameters
    {
        $this->retry_after = $retry_after;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'migrate_to_chat_id' => $this->migrate_to_chat_id,
            'retry_after' => $this->retry_after,
        ];
    }
}
