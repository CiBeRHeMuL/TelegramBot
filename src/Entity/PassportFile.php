<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a file uploaded to Telegram Passport.
 * Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 * @link https://core.telegram.org/bots/api#passportfile
 */
class PassportFile implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file,
     * which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int $file_size File size in bytes
     * @param int $file_date Unix time when the file was uploaded
     */
    public function __construct(
        private string $file_id,
        private string $file_unique_id,
        private int $file_size,
        private int $file_date
    ) {
    }

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function setFileId(string $file_id): PassportFile
    {
        $this->file_id = $file_id;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): PassportFile
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getFileSize(): int
    {
        return $this->file_size;
    }

    public function setFileSize(int $file_size): PassportFile
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function getFileDate(): int
    {
        return $this->file_date;
    }

    public function setFileDate(int $file_date): PassportFile
    {
        $this->file_date = $file_date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'file_size' => $this->file_size,
            'file_date' => $this->file_date,
        ];
    }
}
