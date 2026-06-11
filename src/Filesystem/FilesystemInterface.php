<?php

namespace AndrewGos\TelegramBot\Filesystem;

use Stringable;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(6): Filesystem; TECH(7): PHP]
/**
 * @moduleContract
 * @purpose Define the contract for filesystem operations: create directories, save files, and touch files.
 *
 * @sees USES_API(6): Dir, File
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: FilesystemInterface, filesystem, mkdir, save, create
// STRUCTURE: ┌Dir/File + options┐ → ○ mkdir/save/create → ⊕ bool success

// region INTERFACE_FilesystemInterface
interface FilesystemInterface
{
    /**
     * Make a directory.
     *
     * @param Dir  $dir
     * @param int  $mode
     * @param bool $recursive
     * @param null $context
     *
     * @return bool
     */
    public function mkdir(Dir $dir, int $mode = 0o777, bool $recursive = false, $context = null): bool;

    /**
     * Write content to file.
     *
     * @param File                                           $file
     * @param bool|int|float|string|Stringable|resource|null $content
     * @param bool                                           $overwrite
     * @param int                                            $mode
     *
     * @return bool
     */
    public function save(File $file, mixed $content, bool $overwrite = false, int $mode = 0o777): bool;

    /**
     * Touch file.
     *
     * @param File $file
     * @param int  $mode
     *
     * @return bool
     */
    public function create(File $file, int $mode = 0o777): bool;
}
// endregion INTERFACE_FilesystemInterface
