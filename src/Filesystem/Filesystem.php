<?php

namespace AndrewGos\TelegramBot\Filesystem;

use Stringable;
use Throwable;

class Filesystem implements FilesystemInterface
{
    public function mkdir(Dir $dir, int $mode = 0777, bool $recursive = false, $context = null): bool
    {
        if ($dir->exists()) {
            if (@chmod($dir->getPath()->getPath(), $mode)) {
                return true;
            }
            return false;
        } elseif (@mkdir($dir->getPath()->getPath(), $mode, $recursive, $context)) {
            return true;
        }
        return false;
    }

    /**
     * @param File $file
     * @param null|bool|int|float|string|Stringable|resource $content
     * @param bool $overwrite
     * @param int $mode
     *
     * @return bool
     */
    public function save(File $file, mixed $content, bool $overwrite = false, int $mode = 0777): bool
    {
        if (!is_resource($content)) {
            try {
                $content = (string) $content;
            } catch (Throwable $e) {
                return false;
            }
        }
        if ($overwrite || !$file->exists()) {
            if ($this->create($file, $mode)) {
                try {
                    $f = fopen($file->getPath()->getPath(), 'wb');
                    if (is_string($content)) {
                        fwrite($f, $content);
                    } else {
                        stream_copy_to_stream($content, $f);
                    }
                    fclose($f);
                    return true;
                } catch (Throwable) {
                    return false;
                }
            }
        }
        return false;
    }

    public function create(File $file, int $mode = 0777): bool
    {
        if ($file->exists()) {
            if (@chmod($file->getPath()->getPath(), $mode)) {
                return true;
            }
        } elseif ($file->getDir()->exists() || $this->mkdir($file->getDir(), $mode, true)) {
            if (
                @touch($file->getPath()->getPath())
                && @chmod($file->getPath()->getPath(), $mode)
            ) {
                return true;
            }
        }
        return false;
    }
}
