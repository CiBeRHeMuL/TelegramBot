<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class IpV4Provider
{
    public static function validAddressProvider(): array
    {
        return [
            ['192.168.1.1'],
            ['0.0.0.0'],
            ['255.255.255.255'],
            ['10.0.0.1'],
            ['172.16.0.1'],
            ['8.8.8.8'],
            ['192.168.1.1/24'],
            ['10.0.0.1/8'],
            ['172.16.0.1/16'],
            ['0.0.0.0/0'],
            ['255.255.255.255/32'],
        ];
    }

    public static function invalidAddressProvider(): array
    {
        return [
            ['256.1.2.3'],
            ['192.168.1'],
            ['192.168.1.1.1'],
            ['abc.def.ghi.jkl'],
            ['192.168.1.1/33'],
            ['192.168.1.1/-1'],
            [''],
        ];
    }
}
