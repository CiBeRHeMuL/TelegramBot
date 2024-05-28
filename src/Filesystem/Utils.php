<?php

namespace AndrewGos\TelegramBot\Filesystem;

use RuntimeException;

final class Utils
{
    public static function normalize(string $path): string
    {
        if ($path === '') {
            return '';
        }

        if (str_starts_with($path, '~')) {
            $path = self::getHomeDir() . substr($path, 2);
        }

        $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);

        [$root, $pathWithoutRoot] = self::split($path);

        $parts = explode(DIRECTORY_SEPARATOR, $pathWithoutRoot);
        $preparedParts = [];
        foreach ($parts as $part) {
            if (in_array($part, ['', '.'], true)) {
                continue;
            }
            if ($part === '..' && count($preparedParts) > 0 && $preparedParts[count($preparedParts) - 1] !== '..') {
                array_pop($preparedParts);
                continue;
            }
            if ($part !== '..' || $root === '') {
                $preparedParts[] = $part;
            }
        }

        return $root . implode(DIRECTORY_SEPARATOR, $preparedParts);
    }

    /**
     * Returns normal path for home directory
     *
     * @return string
     */
    public static function getHomeDir(): string
    {
        // If UNIX
        if (getenv('HOME')) {
            return self::normalize(getenv('HOME'));
        }
        // If Windows >= 8
        if (getenv('HOMEDRIVE') && getenv('HOMEPATH')) {
            return self::normalize(getenv('HOMEDRIVE') . DIRECTORY_SEPARATOR . getenv('HOMEPATH'));
        }
        throw new RuntimeException('Could not determine home directory');
    }

    /**
     * Split path into its root directory and the remainder
     *
     * @param string $path
     *
     * @return string[]
     */
    public static function split(string $path): array
    {
        if ($path === '') {
            return ['', ''];
        }

        $root = '';
        $schemeSeparatorPosition = strpos($path, '://');
        if ($schemeSeparatorPosition !== false) {
            $root = substr($path, 0, $schemeSeparatorPosition + 3);
            $path = substr($path, $schemeSeparatorPosition + 3);
        }

        $pathLength = strlen($path);
        if (str_starts_with($path, DIRECTORY_SEPARATOR)) {
            $root .= DIRECTORY_SEPARATOR;
            $path = $pathLength > 1 ? substr($path, 1) : '';
        } elseif ($pathLength > 1 && ctype_alpha($path[0]) && ':' === $path[1]) {
            if ($pathLength === 2) {
                $root .= $path . DIRECTORY_SEPARATOR;
                $path = '';
            } elseif ($path[2] === DIRECTORY_SEPARATOR) {
                $root .= substr($path, 0, 3);
                $path = $pathLength > 3 ? substr($path, 3) : '';
            }
        }

        return [$root, $path];
    }
}
