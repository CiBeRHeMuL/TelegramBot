<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\IpV6Provider;
use AndrewGos\TelegramBot\ValueObject\IpV6;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(IpV6::class)]
class IpV6Test extends TestCase
{
    #[DataProviderExternal(IpV6Provider::class, 'validAddressProvider')]
    public function testValidAddress(string $address): void
    {
        $vo = new IpV6($address);
        $this->assertSame($address, $vo->getAddress());
    }

    #[DataProviderExternal(IpV6Provider::class, 'invalidAddressProvider')]
    public function testInvalidAddress(string $invalidAddress): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new IpV6($invalidAddress);
    }
}
