<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\WebhookInfo;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getWebhookInfo method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get webhook info, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ WebhookInfo

// region CLASS_GetWebhookInfoResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
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
