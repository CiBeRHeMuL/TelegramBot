<?php

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\UrlProvider;
use AndrewGos\TelegramBot\ValueObject\Url;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(Url::class)]
class UrlTest extends TestCase
{
    #[DataProviderExternal(UrlProvider::class, 'validUrlProvider')]
    public function testValidUrl(string $url): void
    {
        $urlVo = new Url($url);
        $this->assertSame($url, $urlVo->getUrl());
    }

    #[DataProviderExternal(UrlProvider::class, 'invalidUrlProvider')]
    public function testInvalidUrl(string $invalidUrl): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new Url($invalidUrl);
    }
}
