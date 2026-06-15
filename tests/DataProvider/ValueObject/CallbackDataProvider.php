<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class CallbackDataProvider
{
    public static function validDataProvider(): array
    {
        return [
            ['x'],
            ['test_callback_data'],
            ['a' . str_repeat('b', 62)],
        ];
    }

    public static function invalidDataProvider(): array
    {
        return [
            [''],
            [str_repeat('a', 65)],
        ];
    }
}
