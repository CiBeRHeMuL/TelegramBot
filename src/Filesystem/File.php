<?php

namespace AndrewGos\TelegramBot\Filesystem;

/**
 * This class represents file in filesystem
 */
final class File
{
    public function __construct(
        private Path $path,
    ) {
    }

    public function getPath(): Path
    {
        return $this->path;
    }

    /**
     * Returns true, if file exists
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
