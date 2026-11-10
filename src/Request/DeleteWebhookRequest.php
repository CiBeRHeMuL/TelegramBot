<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

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
