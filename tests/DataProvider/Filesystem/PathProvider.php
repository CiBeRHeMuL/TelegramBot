<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\Filesystem;

use AndrewGos\TelegramBot\Filesystem\Utils;

class PathProvider
{
    public static function constructorProvider(): array
    {
        $ds = DIRECTORY_SEPARATOR;
        return [
            'simple' => ['/a/b/c', "{$ds}a{$ds}b{$ds}c"],
            'mixed_slashes' => ['/a\\b/c', "{$ds}a{$ds}b{$ds}c"],
            'dots' => ['/a/./b/../c', "{$ds}a{$ds}c"],
            'double_dots_root' => ['/../a/b', "{$ds}a{$ds}b"],
            'trailing_slash' => ['/a/b/', "{$ds}a{$ds}b"],
            'empty' => ['', ''],
            __DIR__ => [__DIR__, __DIR__],
            '~' => ['~', Utils::getHomeDir()],
        ];
    }
}
