<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Filesystem;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(6): Filesystem; TECH(5): ValueObject]
/**
 * @moduleContract
 * @purpose Represent a directory in the filesystem, providing path access, existence checks, and file creation.
 *
 * @sees USES_API(5): Path, File
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Dir, filesystem, directory, path
// STRUCTURE: ┌Path┐ → ○ getPath/exists/getFile → ⊕ Path | bool | File

// region CLASS_Dir
/**
 * This class represents dir in filesystem.
 */
final class Dir
{
    public function __construct(
        private Path $path,
    ) {}

    public function getPath(): Path
    {
        return $this->path;
    }

    /**
     * Returns true, if directory exists.
     *
     * @return bool
     */
    public function exists(): bool
    {
        return is_dir($this->path->getPath());
    }

    public function getFile(Path $path): File
    {
        return new File(
            new Path($this->path->getPath() . DIRECTORY_SEPARATOR . $path->getPath()),
        );
    }
}
// endregion CLASS_Dir
