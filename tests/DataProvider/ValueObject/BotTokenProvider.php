<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class BotTokenProvider
{
    public static function validTokenProvider(): array
    {
        return [
            ['123456789:AABBCCDDEEFFGGHHIIJJKKLLMMNNOOPPQQR'],
            ['1234567890:AABBCCDDEEFFGGHHIIJJKKLLMMNNOOPPQQR'],
        ];
    }

    public static function invalidTokenProvider(): array
    {
        return [
            ['123456789:invalid'], // Too short
            ['invalid:AABBCCDDEEFFGGHHIIJJKKLLMMNNOOPPQQR'], // Invalid prefix
            ['123456789:'], // Missing suffix
            [':AABBCCDDEEFFGGHHIIJJKKLLMMNNOOPPQQR'], // Missing prefix
        ];
    }
}
