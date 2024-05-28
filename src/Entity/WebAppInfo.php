<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Describes a Web App.
 * @link https://core.telegram.org/bots/api#webappinfo
 * @link https://core.telegram.org/bots/webapps
 */
class WebAppInfo extends AbstractEntity
{
    /**
     * @param Url $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     */
    public function __construct(
        protected Url $url,
    ) {
        parent::__construct();
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

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
