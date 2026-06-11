<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteWebhook method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deletewebhook
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, Webhook
// STRUCTURE: ▶ ┌drop_pending_updates┐ → ◇ construct → ⊕ → ∑ ⟦DeleteWebhookRequest⟧

// region CLASS_DeleteWebhookRequest
/**
 * @see https://core.telegram.org/bots/api#deletewebhook
 */
class DeleteWebhookRequest implements RequestInterface
{
    /**
     * @param bool|null $drop_pending_updates Pass True to drop all pending updates
     */
    public function __construct(
        private ?bool $drop_pending_updates = null,
    ) {}

    public function getDropPendingUpdates(): ?bool
    {
        return $this->drop_pending_updates;
    }

    public function setDropPendingUpdates(?bool $drop_pending_updates): DeleteWebhookRequest
    {
        $this->drop_pending_updates = $drop_pending_updates;

        return $this;
    }
}
// endregion CLASS_DeleteWebhookRequest
