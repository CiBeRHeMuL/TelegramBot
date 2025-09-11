<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\Filesystem;

use AndrewGos\TelegramBot\Filesystem\Utils;

class DirProvider
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

    public static function existsProvider(): array
    {
        return [
            'simple' => ['/a/b/c', false],
            'mixed_slashes' => ['/a\\b/c', false],
            'dots' => ['/a/./b/../c', false],
            'double_dots_root' => ['/../a/b', false],
            'trailing_slash' => ['/a/b/', false],
            'empty' => ['', false],
            __DIR__ => [__DIR__, true],
            '~' => ['~', true],
        ];
    }

    public static function fileProvider(): array
    {
        $ds = DIRECTORY_SEPARATOR;
        return [
            'simple' => ['/a/b/c', 'asdf.php', "{$ds}a{$ds}b{$ds}c" . $ds . 'asdf.php'],
            'mixed_slashes' => ['/a\\b/c', 'asdf.php', "{$ds}a{$ds}b{$ds}c" . $ds . 'asdf.php'],
            'dots' => ['/a/./b/../c', 'asdf.php', "{$ds}a{$ds}c" . $ds . 'asdf.php'],
            'double_dots_root' => ['/../a/b', 'asdf.php', "{$ds}a{$ds}b" . $ds . 'asdf.php'],
            'trailing_slash' => ['/a/b/', 'asdf.php', "{$ds}a{$ds}b" . $ds . 'asdf.php'],
            'empty' => ['', 'asdf.php', '' . $ds . 'asdf.php'],
            __DIR__ => [__DIR__, 'asdf.php', __DIR__ . $ds . 'asdf.php'],
            '~' => ['~', 'asdf.php', Utils::getHomeDir() . $ds . 'asdf.php'],
        ];
    }
}
