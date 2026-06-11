<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BusinessConnection;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API businessConnection method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: business connection, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ BusinessConnection

// region CLASS_BusinessConnectionResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class BusinessConnectionResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BusinessConnection $connection = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getConnection(): ?BusinessConnection
    {
        return $this->connection;
    }
}

// endregion CLASS_BusinessConnectionResponse
