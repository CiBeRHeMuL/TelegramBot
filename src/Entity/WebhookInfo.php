<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\ValueObject\IpV4;
use AndrewGos\TelegramBot\ValueObject\IpV6;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Describes the current status of a webhook.
 * @link https://core.telegram.org/bots/api#webhookinfo
 */
class WebhookInfo implements EntityInterface
{
    /**
     * @param Url $url Webhook URL, may be empty if webhook is not set up
     * @param bool $has_custom_certificate True, if a custom certificate was provided for webhook certificate checks
     * @param int $pending_update_count Number of updates awaiting delivery
     * @param UpdateTypeEnum[]|null $allowed_updates Optional. A list of update types the bot is subscribed to. Defaults to all update types
     * except chat_member
     * @param IpV4|IpV6|null $ip_address Optional. Currently used webhook IP address
     * @param int|null $last_error_date Optional. Unix time for the most recent error that happened when trying to deliver an update
     * via webhook
     * @param string|null $last_error_message Optional. Error message in human-readable format for the most recent error that happened
     * when trying to deliver an update via webhook
     * @param int|null $last_synchronization_error_date Optional. Unix time of the most recent error that happened when trying to
     * synchronize available updates with Telegram datacenters
     * @param int|null $max_connections Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for
     * update delivery
     */
    public function __construct(
        private Url $url,
        private bool $has_custom_certificate,
        private int $pending_update_count,
        private array|null $allowed_updates = null,
        private IpV4|IpV6|null $ip_address = null,
        private int|null $last_error_date = null,
        private string|null $last_error_message = null,
        private int|null $last_synchronization_error_date = null,
        private int|null $max_connections = null,
    ) {
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

    public function setUrl(Url $url): WebhookInfo
    {
        $this->url = $url;
        return $this;
    }

    public function getHasCustomCertificate(): bool
    {
        return $this->has_custom_certificate;
    }

    public function setHasCustomCertificate(bool $has_custom_certificate): WebhookInfo
    {
        $this->has_custom_certificate = $has_custom_certificate;
        return $this;
    }

    public function getPendingUpdateCount(): int
    {
        return $this->pending_update_count;
    }

    public function setPendingUpdateCount(int $pending_update_count): WebhookInfo
    {
        $this->pending_update_count = $pending_update_count;
        return $this;
    }

    public function getAllowedUpdates(): array|null
    {
        return $this->allowed_updates;
    }

    public function setAllowedUpdates(array|null $allowed_updates): WebhookInfo
    {
        $this->allowed_updates = $allowed_updates;
        return $this;
    }

    public function getIpAddress(): IpV4|IpV6|null
    {
        return $this->ip_address;
    }

    public function setIpAddress(IpV4|IpV6|null $ip_address): WebhookInfo
    {
        $this->ip_address = $ip_address;
        return $this;
    }

    public function getLastErrorDate(): int|null
    {
        return $this->last_error_date;
    }

    public function setLastErrorDate(int|null $last_error_date): WebhookInfo
    {
        $this->last_error_date = $last_error_date;
        return $this;
    }

    public function getLastErrorMessage(): string|null
    {
        return $this->last_error_message;
    }

    public function setLastErrorMessage(string|null $last_error_message): WebhookInfo
    {
        $this->last_error_message = $last_error_message;
        return $this;
    }

    public function getLastSynchronizationErrorDate(): int|null
    {
        return $this->last_synchronization_error_date;
    }

    public function setLastSynchronizationErrorDate(int|null $last_synchronization_error_date): WebhookInfo
    {
        $this->last_synchronization_error_date = $last_synchronization_error_date;
        return $this;
    }

    public function getMaxConnections(): int|null
    {
        return $this->max_connections;
    }

    public function setMaxConnections(int|null $max_connections): WebhookInfo
    {
        $this->max_connections = $max_connections;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'url' => $this->url->getUrl(),
            'has_custom_certificate' => $this->has_custom_certificate,
            'pending_update_count' => $this->pending_update_count,
            'allowed_updates' => $this->allowed_updates
                ? array_map(fn(UpdateTypeEnum $e) => $e->value, $this->allowed_updates)
                : null,
            'ip_address' => $this->ip_address?->getAddress(),
            'last_error_date' => $this->last_error_date,
            'last_error_message' => $this->last_error_message,
            'last_synchronization_error_date' => $this->last_synchronization_error_date,
            'max_connections' => $this->max_connections,
        ];
    }
}
