<?php

namespace AndrewGos\TelegramBot\Filesystem;

use Stringable;
use Throwable;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(6): Filesystem; TECH(7): PHP]
/**
 * @moduleContract
 * @purpose Implement filesystem operations: creating directories, saving file content, and touching files.
 *
 * @sees USES_API(7): FilesystemInterface, Dir, File
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Filesystem, filesystem, mkdir, save, create, chmod
// STRUCTURE: ┌Dir/File + options┐ → ○ mkdir (chmod|mkdir) → ○ save (create+fwrite|stream_copy) → ○ create (chmod|touch+chmod) → ⊕ bool

// region CLASS_Filesystem
class Filesystem implements FilesystemInterface
{
    public function mkdir(Dir $dir, int $mode = 0o777, bool $recursive = false, $context = null): bool
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
     * @param File                                           $file
     * @param bool|int|float|string|Stringable|resource|null $content
     * @param bool                                           $overwrite
     * @param int                                            $mode
     *
     * @return bool
     */
    public function save(File $file, mixed $content, bool $overwrite = false, int $mode = 0o777): bool
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

    public function create(File $file, int $mode = 0o777): bool
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
// endregion CLASS_Filesystem
