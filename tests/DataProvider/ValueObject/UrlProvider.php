<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class UrlProvider
{
    /**
     * @return array<int, array{0: string, 1: string}>
     */
    public static function validUrlProvider(): array
    {
        return [
            ['http://example.com', 'http://example.com'],
            ['https://example.com', 'https://example.com'],
            ['https://www.example.com/path?query=string#fragment', 'https://www.example.com/path?query=string#fragment'],
            ['ftp://user:password@example.com', 'ftp://user:password@example.com'],
            ['example.com', 'https://example.com'],
            ['t.me/path', 'https://t.me/path'],
            ['telegram.org?start=123', 'https://telegram.org?start=123'],
        ];
    }

    /**
     * @return array<int, array{0: string}>
     */
    public static function invalidUrlProvider(): array
    {
        return [
            ['invalid-url'],
            ['http//example.com'],
            ['https:// example.com'],
        ];
    }
}
