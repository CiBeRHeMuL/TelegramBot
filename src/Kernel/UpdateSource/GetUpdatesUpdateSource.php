<?php

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Request\GetUpdatesRequest;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Long-polling via getUpdates API method.
 *
 * @sees USES_API(9): ApiInterface, UpdateSourceInterface, GetUpdatesRequest
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: GetUpdatesUpdateSource, long polling, getUpdates
// STRUCTURE: ▶ getUpdates() → ○ api->getUpdates() → ◇ offset → ○ yield update → ⊕ lastUpdateId++

// region CLASS_GetUpdatesUpdateSource [DOMAIN(8): Telegram; CONCEPT(7): UpdateSource; TECH(9): PHP]
class GetUpdatesUpdateSource implements UpdateSourceInterface
{
    private ?int $lastUpdateId = null;

    public function __construct(
        private ApiInterface $api,
        private ?int $limit = null,
        private ?int $timeout = null,
    ) {}

    public function getUpdates(): iterable
    {
        $updates = $this
            ->api
            ->getUpdates(new GetUpdatesRequest(
                limit: $this->limit,
                offset: $this->lastUpdateId,
                timeout: $this->timeout,
            ))
            ->getUpdates();
        foreach ($updates ?? [] as $update) {
            yield $update;

            $this->lastUpdateId = $update->getUpdateId() + 1;
        }
    }
}
// endregion CLASS_GetUpdatesUpdateSource
