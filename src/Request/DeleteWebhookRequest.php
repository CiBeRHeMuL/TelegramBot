<?php

namespace AndrewGos\TelegramBot\Request;

class DeleteWebhookRequest implements RequestInterface
{
    /**
     * @param bool|null $drop_pending_updates Pass True to drop all pending updates
     */
    public function __construct(
        private bool|null $drop_pending_updates = null,
    ) {
    }

    public function getDropPendingUpdates(): bool|null
    {
        return $this->drop_pending_updates;
    }

    public function setDropPendingUpdates(bool|null $drop_pending_updates): DeleteWebhookRequest
    {
        $this->drop_pending_updates = $drop_pending_updates;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'drop_pending_updates' => $this->drop_pending_updates,
        ];
    }
}
