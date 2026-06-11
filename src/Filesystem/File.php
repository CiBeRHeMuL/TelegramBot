<?php

namespace AndrewGos\TelegramBot\Filesystem;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(6): Filesystem; TECH(5): ValueObject]
/**
 * @moduleContract
 * @purpose Represent a file in the filesystem, providing path access and existence checks.
 *
 * @sees USES_API(5): Path
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: File, filesystem, path, file existence
// STRUCTURE: ┌Path┐ → ○ getPath/exists/getDir → ⊕ Path | bool | Dir

// region CLASS_File
/**
 * This class represents file in filesystem.
 */
final class File
{
    public function __construct(
        private Path $path,
    ) {}

    public function getPath(): Path
    {
        return $this->path;
    }

    /**
     * Returns true, if file exists.
     *
     * @return bool
     */
    public function exists(): bool
    {
        return file_exists($this->path->getPath());
    }

    public function getDir(): Dir
    {
        return new Dir(new Path(dirname($this->path->getPath())));
    }
}
// endregion CLASS_File
