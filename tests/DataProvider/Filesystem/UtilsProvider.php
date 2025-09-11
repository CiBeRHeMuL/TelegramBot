<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\Filesystem;

use AndrewGos\TelegramBot\Filesystem\Utils;

class UtilsProvider
{
    public static function normalizePathProvider(): array
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
            '~/a' => ['~/a', Utils::getHomeDir() . $ds . 'a'],
        ];
    }

    public static function splitProvider(): array
    {
        $ds = DIRECTORY_SEPARATOR;
        return [
            'simple' => ['/a/b/c', [$ds, "a{$ds}b{$ds}c"]],
            'mixed_slashes' => ["/a\\b/c", [$ds, "a\\b{$ds}c"]],
            'dots' => ['/a/./b/../c', [$ds, "a{$ds}.{$ds}b{$ds}..{$ds}c"]],
            'empty' => ['', ['', '']],
            'scheme' => ['https://a/b/c', ['https://', "a{$ds}b{$ds}c"]],
            'windows_short' => ['C:', ['C:' . DIRECTORY_SEPARATOR, '']],
            'windows' => ['C:' . DIRECTORY_SEPARATOR . 'a/b/c', ['C:' . DIRECTORY_SEPARATOR, "a{$ds}b{$ds}c"]],
        ];
    }

    public static function homeDirProvider(): array
    {
        $ds = DIRECTORY_SEPARATOR;
        return [
            // Unix
            'simple' => ['/a/b/c', "{$ds}a{$ds}b{$ds}c"],
            'mixed_slashes' => ["/a\\b/c", "{$ds}a{$ds}b{$ds}c"],

            // Windows
            'windows' => [["C:", '/a/b/c'], "C:{$ds}{$ds}a{$ds}b{$ds}c"],
            'windows_slashes' => [["C:", '\\a\\b\\c'], "C:{$ds}{$ds}a{$ds}b{$ds}c"],

            // Error
            'error' => ['', ''],
        ];
    }
}
