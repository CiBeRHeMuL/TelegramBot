<?php

namespace AndrewGos\TelegramBot\Client\UpdateSource;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Request\GetUpdatesRequest;

class GetUpdatesUpdateSource implements UpdateSourceInterface
{
    public function __construct(
        private ApiInterface $api,
    ) {
    }

    public function getUpdates(): array
    {
        return $this->api->getUpdates(new GetUpdatesRequest())->getUpdates() ?? [];
    }
}
