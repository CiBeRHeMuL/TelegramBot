<?php

namespace AndrewGos\TelegramBot\Tests\ValueObject\DataProvider;

class UrlProvider
{
    public static function validUrlProvider(): array
    {
        return [
            ['http://example.com'],
            ['https://example.com'],
            ['https://www.example.com/path?query=string#fragment'],
            ['ftp://user:password@example.com'],
        ];
    }

    public static function invalidUrlProvider(): array
    {
        return [
            ['invalid-url'],
            ['example.com'],
            ['http//example.com'],
            ['https:// example.com'],
        ];
    }
}
