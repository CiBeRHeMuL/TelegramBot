<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\IpV4Provider;
use AndrewGos\TelegramBot\ValueObject\IpV4;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(IpV4::class)]
class IpV4Test extends TestCase
{
    #[DataProviderExternal(IpV4Provider::class, 'validAddressProvider')]
    public function testValidAddress(string $address): void
    {
        $vo = new IpV4($address);
        $this->assertSame($address, $vo->getAddress());
    }

    #[DataProviderExternal(IpV4Provider::class, 'invalidAddressProvider')]
    public function testInvalidAddress(string $invalidAddress): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new IpV4($invalidAddress);
    }
}
