<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Describes a Web App.
 *
 * @see https://core.telegram.org/bots/webapps Web App
 * @link https://core.telegram.org/bots/api#webappinfo
 */
final class WebAppInfo implements EntityInterface
{
    /**
     * @param Url $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     *
     * @see https://core.telegram.org/bots/webapps#initializing-mini-apps Initializing Web Apps
     */
    public function __construct(
        protected Url $url,
    ) {
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return WebAppInfo
     */
    public function setUrl(Url $url): WebAppInfo
    {
        $this->url = $url;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'url' => $this->url->getUrl(),
        ];
    }
}
