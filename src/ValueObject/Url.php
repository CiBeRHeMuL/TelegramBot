<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

readonly class Url
{
    /**
     * @param string $url
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $url,
    ) {
        if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid url representation');
        }
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
