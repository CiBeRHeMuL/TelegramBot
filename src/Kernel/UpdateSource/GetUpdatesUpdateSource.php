<?php

namespace AndrewGos\TelegramBot\Kernel\UpdateSource;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Request\GetUpdatesRequest;

readonly class GetUpdatesUpdateSource implements UpdateSourceInterface
{
    public function __construct(
        private ApiInterface $api,
    ) {
    }

    public function getUpdates(): iterable
    {
        yield from ($this->api->getUpdates(new GetUpdatesRequest())->getUpdates() ?? []);
    }
}
