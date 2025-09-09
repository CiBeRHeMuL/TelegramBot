<?php

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\ChatIdProvider;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(ChatId::class)]
class ChatIdTest extends TestCase
{
    #[DataProviderExternal(ChatIdProvider::class, 'validIdProvider')]
    public function testValidId(int|string $id): void
    {
        $chatIdVo = new ChatId($id);
        $this->assertSame($id, $chatIdVo->getId());
    }

    #[DataProviderExternal(ChatIdProvider::class, 'invalidIdProvider')]
    public function testInvalidId(string $invalidId): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new ChatId($invalidId);
    }
}
