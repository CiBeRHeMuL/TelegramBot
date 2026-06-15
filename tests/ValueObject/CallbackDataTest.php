<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\CallbackDataProvider;
use AndrewGos\TelegramBot\ValueObject\CallbackData;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(CallbackData::class)]
class CallbackDataTest extends TestCase
{
    #[DataProviderExternal(CallbackDataProvider::class, 'validDataProvider')]
    public function testValidData(string $data): void
    {
        $vo = new CallbackData($data);
        $this->assertSame($data, $vo->getData());
    }

    #[DataProviderExternal(CallbackDataProvider::class, 'invalidDataProvider')]
    public function testInvalidData(string $invalidData): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new CallbackData($invalidData);
    }
}
