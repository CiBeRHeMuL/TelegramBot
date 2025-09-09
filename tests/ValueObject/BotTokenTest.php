<?php

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\BotTokenProvider;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(BotToken::class)]
class BotTokenTest extends TestCase
{
    #[DataProviderExternal(BotTokenProvider::class, 'validTokenProvider')]
    public function testValidToken(string $token): void
    {
        $tokenVo = new BotToken($token);
        $this->assertSame($token, $tokenVo->getToken());
    }

    #[DataProviderExternal(BotTokenProvider::class, 'invalidTokenProvider')]
    public function testInvalidToken(string $invalidToken): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new BotToken($invalidToken);
    }
}
