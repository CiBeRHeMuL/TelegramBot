<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class LanguageProvider
{
    public static function validLanguageProvider(): array
    {
        return [
            ['en'],
            ['ru'],
            ['en-US'],
            ['zh-Hans-CN'],
            ['sr-Latn-RS'],
            ['art-lojban'],
            ['i-klingon'],
            ['x-private'],
        ];
    }

    public static function invalidLanguageProvider(): array
    {
        return [
            [''],
            ['123'],
            ['toolonglangcode'],
            ['en_US'],
        ];
    }
}
