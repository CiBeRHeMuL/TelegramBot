<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class ChatIdProvider
{
    public static function validIdProvider(): array
    {
        return [
            [123_456_789],
            [-1_001_234_567_890],
            ['@channelusername'],
            ['@supergroup123'],
        ];
    }

    public static function invalidIdProvider(): array
    {
        return [
            ['@shrt'], // Too short username
            ['@invalid-char'], // Invalid character in username
            ['channelusername'], // Missing @
        ];
    }
}
