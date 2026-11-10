<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\WebhookInfo;

// region CLASS_GetWebhookInfoResponse
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

// endregion CLASS_GetWebhookInfoResponse
