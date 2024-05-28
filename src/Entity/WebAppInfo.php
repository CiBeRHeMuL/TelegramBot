<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Describes a Web App.
 * @link https://core.telegram.org/bots/api#webappinfo
 * @link https://core.telegram.org/bots/webapps
 */
class WebAppInfo implements EntityInterface
{
    public function __construct(
        private Url $url,
    ) {
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
