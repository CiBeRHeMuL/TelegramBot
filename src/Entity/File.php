<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a file ready to be downloaded.
 * The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>.
 * It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile.
 *
 * The maximum file size to download is 20 MB
 * @link https://core.telegram.org/bots/api#file
 */
class File implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file.
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     * @param int|null $file_size Optional. File size in bytes.
     * It can be bigger than 2^31, and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float
     * type are safe for storing this value.
     * @param string|null $file_path Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
     */
    public function __construct(
        private string $file_id,
        private string $file_unique_id,
        private int|null $file_size = null,
        private string|null $file_path = null,
    ) {
    }

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function setFileId(string $file_id): File
    {
        $this->file_id = $file_id;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): File
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getFileSize(): int|null
    {
        return $this->file_size;
    }

    public function setFileSize(int|null $file_size): File
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function getFilePath(): string|null
    {
        return $this->file_path;
    }

    public function setFilePath(string|null $file_path): File
    {
        $this->file_path = $file_path;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'file_size' => $this->file_size,
            'file_path' => $this->file_path,
        ];
    }
}
