<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\EncodedJsonProvider;
use AndrewGos\TelegramBot\ValueObject\EncodedJson;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(EncodedJson::class)]
class EncodedJsonTest extends TestCase
{
    #[DataProviderExternal(EncodedJsonProvider::class, 'validJsonProvider')]
    public function testValidJson(string $json): void
    {
        $vo = new EncodedJson($json);
        $this->assertSame($json, $vo->getJson());
    }

    #[DataProviderExternal(EncodedJsonProvider::class, 'invalidJsonProvider')]
    public function testInvalidJson(string $invalidJson): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new EncodedJson($invalidJson);
    }
}
