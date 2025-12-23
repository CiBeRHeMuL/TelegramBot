<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\ValueObject\IpV4;
use AndrewGos\TelegramBot\ValueObject\IpV6;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Describes the current status of a webhook.
 *
 * @link https://core.telegram.org/bots/api#webhookinfo
 */
final class WebhookInfo implements EntityInterface
{
    /**
     * @param ?Url $url Webhook URL, may be empty if webhook is not set up
     * @param bool $has_custom_certificate True, if a custom certificate was provided for webhook certificate checks
     * @param int $pending_update_count Number of updates awaiting delivery
     * @param UpdateTypeEnum[]|null $allowed_updates Optional. A list of update types the bot is subscribed to. Defaults to all update
     * types except chat_member
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
        protected ?Url $url,
        protected bool $has_custom_certificate,
        protected int $pending_update_count,
        #[ArrayType(UpdateTypeEnum::class)]
        protected ?array $allowed_updates = null,
        protected IpV4|IpV6|null $ip_address = null,
        protected ?int $last_error_date = null,
        protected ?string $last_error_message = null,
        protected ?int $last_synchronization_error_date = null,
        protected ?int $max_connections = null,
    ) {}

    /**
     * @return Url|null
     */
    public function getUrl(): ?Url
    {
        return $this->url;
    }

    /**
     * @param Url|null $url
     *
     * @return WebhookInfo
     */
    public function setUrl(?Url $url): WebhookInfo
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasCustomCertificate(): bool
    {
        return $this->has_custom_certificate;
    }

    /**
     * @param bool $has_custom_certificate
     *
     * @return WebhookInfo
     */
    public function setHasCustomCertificate(bool $has_custom_certificate): WebhookInfo
    {
        $this->has_custom_certificate = $has_custom_certificate;
        return $this;
    }

    /**
     * @return int
     */
    public function getPendingUpdateCount(): int
    {
        return $this->pending_update_count;
    }

    /**
     * @param int $pending_update_count
     *
     * @return WebhookInfo
     */
    public function setPendingUpdateCount(int $pending_update_count): WebhookInfo
    {
        $this->pending_update_count = $pending_update_count;
        return $this;
    }

    /**
     * @return UpdateTypeEnum[]|null
     */
    public function getAllowedUpdates(): ?array
    {
        return $this->allowed_updates;
    }

    /**
     * @param UpdateTypeEnum[]|null $allowed_updates
     *
     * @return WebhookInfo
     */
    public function setAllowedUpdates(?array $allowed_updates): WebhookInfo
    {
        $this->allowed_updates = $allowed_updates;
        return $this;
    }

    /**
     * @return IpV4|IpV6|null
     */
    public function getIpAddress(): IpV4|IpV6|null
    {
        return $this->ip_address;
    }

    /**
     * @param IpV4|IpV6|null $ip_address
     *
     * @return WebhookInfo
     */
    public function setIpAddress(IpV4|IpV6|null $ip_address): WebhookInfo
    {
        $this->ip_address = $ip_address;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastErrorDate(): ?int
    {
        return $this->last_error_date;
    }

    /**
     * @param int|null $last_error_date
     *
     * @return WebhookInfo
     */
    public function setLastErrorDate(?int $last_error_date): WebhookInfo
    {
        $this->last_error_date = $last_error_date;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastErrorMessage(): ?string
    {
        return $this->last_error_message;
    }

    /**
     * @param string|null $last_error_message
     *
     * @return WebhookInfo
     */
    public function setLastErrorMessage(?string $last_error_message): WebhookInfo
    {
        $this->last_error_message = $last_error_message;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastSynchronizationErrorDate(): ?int
    {
        return $this->last_synchronization_error_date;
    }

    /**
     * @param int|null $last_synchronization_error_date
     *
     * @return WebhookInfo
     */
    public function setLastSynchronizationErrorDate(?int $last_synchronization_error_date): WebhookInfo
    {
        $this->last_synchronization_error_date = $last_synchronization_error_date;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxConnections(): ?int
    {
        return $this->max_connections;
    }

    /**
     * @param int|null $max_connections
     *
     * @return WebhookInfo
     */
    public function setMaxConnections(?int $max_connections): WebhookInfo
    {
        $this->max_connections = $max_connections;
        return $this;
    }
}
