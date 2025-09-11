<?php

namespace AndrewGos\TelegramBot\Filesystem;

use Stringable;

interface FilesystemInterface
{
    /**
     * Make a directory
     *
     * @param Dir $dir
     * @param int $mode
     * @param bool $recursive
     * @param null $context
     *
     * @return bool
     */
    public function mkdir(Dir $dir, int $mode = 0777, bool $recursive = false, $context = null): bool;

    /**
     * Write content to file
     *
     * @param File $file
     * @param null|bool|int|float|string|Stringable|resource $content
     * @param bool $overwrite
     * @param int $mode
     *
     * @return bool
     */
    public function save(File $file, mixed $content, bool $overwrite = false, int $mode = 0777): bool;

    /**
     * Touch file
     *
     * @param File $file
     * @param int $mode
     *
     * @return bool
     */
    public function create(File $file, int $mode = 0777): bool;
}
