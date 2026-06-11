<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Update;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getUpdates method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get updates, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ Update[]

// region CLASS_GetUpdatesResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetUpdatesResponse extends AbstractResponse
{
    /**
     * @param RawResponse   $rawResponse
     * @param Update[]|null $updates
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $updates = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getUpdates(): ?array
    {
        return $this->updates;
    }
}

// endregion CLASS_GetUpdatesResponse
