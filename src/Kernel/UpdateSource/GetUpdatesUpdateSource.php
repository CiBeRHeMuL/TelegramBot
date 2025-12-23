<?php

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Request\GetUpdatesRequest;

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
        foreach ($updates as $update) {
            yield $update;

            $this->lastUpdateId = $update->getUpdateId() + 1;
        }
    }
}
