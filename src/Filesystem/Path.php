<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Filesystem;

// region CLASS_Path
/**
 * This class represents path in filesystem.
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
// endregion CLASS_Path
