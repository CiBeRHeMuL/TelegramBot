<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use Throwable;
use Uri\WhatWg\Url as WhatWgUrl;

// region CLASS_Url
#[CanBeBuiltFromScalar]
readonly class Url
{
    private string $url;

    /**
     * @param string $url
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        string $url,
    ) {
        $this->url = $this->normalize($url);
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    private function normalize(string $url): string
    {
        // Check that url has schema
        if (!preg_match('/^[A-Za-z][A-Za-z0-9+.-]*:\/\//u', $url)) {
            $url = 'https://' . $url;
        }

        try {
            $parsed = new WhatWgUrl($url);

            $host = $parsed->getAsciiHost();
            // Use behavior from "filter_var" branch
            if ($host !== null && $host !== '' && str_contains($host, '.')) {
                return $url;
            }
        } catch (Throwable) {
        }

        throw new InvalidValueObjectConfigException(self::class, 'invalid url representation');
    }
}
// endregion CLASS_Url
