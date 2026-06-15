<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class EncodedJsonProvider
{
    public static function validJsonProvider(): array
    {
        return [
            ['{"key": "value"}'],
            ['[]'],
            ['[1, 2, 3]'],
            ['{"nested": {"a": 1}}'],
            ['null'],
            ['true'],
            ['false'],
            ['123'],
            ['"string"'],
        ];
    }

    public static function invalidJsonProvider(): array
    {
        return [
            ['{invalid}'],
            ['{"key": value}'],
            ['not json'],
            [''],
        ];
    }
}
