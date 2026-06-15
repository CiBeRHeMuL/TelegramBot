<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class IpV6Provider
{
    public static function validAddressProvider(): array
    {
        return [
            ['::1'],
            ['2001:0db8:85a3:0000:0000:8a2e:0370:7334'],
            ['fe80::1'],
            ['2001:db8:85a3::8a2e:370:7334'],
        ];
    }

    public static function invalidAddressProvider(): array
    {
        return [
            ['not-an-ip'],
            ['192.168.1.1'],
            ['gggg::1'],
            [''],
            ['::'],
        ];
    }
}
