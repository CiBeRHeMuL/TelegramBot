<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\WebhookInfo;

class GetWebhookInfoResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ?WebhookInfo $webhookInfo = null,
    ) {
        parent::__construct($response);
    }

    public function getWebhookInfo(): ?WebhookInfo
    {
        return $this->webhookInfo;
    }
}
