<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\LanguageProvider;
use AndrewGos\TelegramBot\ValueObject\Language;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(Language::class)]
class LanguageTest extends TestCase
{
    #[DataProviderExternal(LanguageProvider::class, 'validLanguageProvider')]
    public function testValidLanguage(string $language): void
    {
        $vo = new Language($language);
        $this->assertSame(strtolower($language), $vo->getLanguage());
    }

    #[DataProviderExternal(LanguageProvider::class, 'invalidLanguageProvider')]
    public function testInvalidLanguage(string $invalidLanguage): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new Language($invalidLanguage);
    }
}
