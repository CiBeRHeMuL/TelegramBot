<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\WebhookInfo;

class GetWebhookInfoResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly WebhookInfo|null $webhookInfo = null,
    ) {
        parent::__construct($response);
    }

    public function getWebhookInfo(): WebhookInfo|null
    {
        return $this->webhookInfo;
    }
}
