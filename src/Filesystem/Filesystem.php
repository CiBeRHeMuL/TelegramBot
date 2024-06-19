<?php

namespace AndrewGos\TelegramBot\Filesystem;

use Throwable;

class Filesystem implements FilesystemInterface
{
    public function mkdir(Dir $dir, int $mode = 0777, bool $recursive = false, $context = null): bool
    {
        if ($dir->exists()) {
            if (chmod($dir->getPath()->getPath(), $mode)) {
                return true;
            }
            return false;
        } elseif (mkdir($dir->getPath()->getPath(), $mode, $recursive, $context)) {
            return true;
        }
        return false;
    }

    public function save(File $file, string $content, bool $overwrite = false, int $mode = 0777): bool
    {
        if ($overwrite || !$file->exists()) {
            if ($this->create($file, $mode)) {
                try {
                    $f = fopen($file->getPath()->getPath(), 'wb');
                    fwrite($f, $content);
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
            if (chmod($file->getPath()->getPath(), $mode)) {
                return true;
            }
        } elseif ($this->mkdir($file->getDir(), $mode, true)) {
            if (
                touch($file->getPath()->getPath())
                && chmod($file->getPath()->getPath(), $mode)
            ) {
                return true;
            }
        }
        return false;
    }
}
