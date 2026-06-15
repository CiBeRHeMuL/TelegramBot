<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class FilenameProvider
{
    public static function validFilenameProvider(): array
    {
        return [
            [__FILE__],
            [__DIR__ . '/FilenameProvider.php'],
        ];
    }

    public static function invalidFilenameProvider(): array
    {
        return [
            ['/nonexistent/file.txt'],
            [''],
        ];
    }
}
