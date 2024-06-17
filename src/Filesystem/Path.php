<?php

namespace AndrewGos\TelegramBot\Filesystem;

/**
 * This class represents path in filesystem
 */
final class Path
{
    public function __construct(
        private string $path,
    ) {
        $this->path = Utils::normalize($this->path);
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
