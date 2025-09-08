<?php

namespace AndrewGos\TelegramBot\Filesystem;

/**
 * This class represents dir in filesystem
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
     * Returns true, if directory exists
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
