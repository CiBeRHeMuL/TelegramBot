<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\IpV4;
use AndrewGos\TelegramBot\ValueObject\IpV6;
use AndrewGos\TelegramBot\ValueObject\Url;

class SetWebhookRequest implements RequestInterface
{
    /**
     * @param Url $url HTTPS URL to send updates to. Use an empty string to remove webhook integration
     * @param UpdateTypeEnum[]|null $allowed_updates A JSON-serialized list of the update types you want your bot to receive. For example,
     * specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete
     * list of available update types. Specify an empty list to receive all update types except chat_member, message_reaction, and
     * message_reaction_count (default). If not specified, the previous setting will be used.Please note that this parameter doesn't
     * affect updates created before the call to the setWebhook, so unwanted updates may be received for a short period of time.
     * @param Filename|Url|null $certificate Upload your public key certificate so that the root certificate in use can be checked.
     * See our self-signed guide for details.
     * @param bool|null $drop_pending_updates Pass True to drop all pending updates
     * @param IpV4|IpV6|null $ip_address The fixed IP address which will be used to send webhook requests instead of the IP address
     * resolved through DNS
     * @param int|null $max_connections The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery,
     * 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
     * @param string|null $secret_token A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook
     * request, 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed. The header is useful to ensure that the request
     * comes from a webhook set by you.
     */
    public function __construct(
        private Url $url,
        private array|null $allowed_updates = null,
        private Filename|Url|null $certificate = null,
        private bool|null $drop_pending_updates = null,
        private IpV4|IpV6|null $ip_address = null,
        private int|null $max_connections = null,
        private string|null $secret_token = null,
    ) {
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

    public function setUrl(Url $url): SetWebhookRequest
    {
        $this->url = $url;
        return $this;
    }

    public function getAllowedUpdates(): array|null
    {
        return $this->allowed_updates;
    }

    public function setAllowedUpdates(array|null $allowed_updates): SetWebhookRequest
    {
        $this->allowed_updates = $allowed_updates;
        return $this;
    }

    public function getCertificate(): Filename|Url|null
    {
        return $this->certificate;
    }

    public function setCertificate(Filename|Url|null $certificate): SetWebhookRequest
    {
        $this->certificate = $certificate;
        return $this;
    }

    public function getDropPendingUpdates(): bool|null
    {
        return $this->drop_pending_updates;
    }

    public function setDropPendingUpdates(bool|null $drop_pending_updates): SetWebhookRequest
    {
        $this->drop_pending_updates = $drop_pending_updates;
        return $this;
    }

    public function getIpAddress(): IpV4|IpV6|null
    {
        return $this->ip_address;
    }

    public function setIpAddress(IpV4|IpV6|null $ip_address): SetWebhookRequest
    {
        $this->ip_address = $ip_address;
        return $this;
    }

    public function getMaxConnections(): int|null
    {
        return $this->max_connections;
    }

    public function setMaxConnections(int|null $max_connections): SetWebhookRequest
    {
        $this->max_connections = $max_connections;
        return $this;
    }

    public function getSecretToken(): string|null
    {
        return $this->secret_token;
    }

    public function setSecretToken(string|null $secret_token): SetWebhookRequest
    {
        $this->secret_token = $secret_token;
        return $this;
    }
}
