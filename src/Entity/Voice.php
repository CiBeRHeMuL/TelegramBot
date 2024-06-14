<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a voice note.
 * @link https://core.telegram.org/bots/api#voice
 */
class Voice extends AbstractEntity
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file.
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     * @param int $duration Duration of the audio in seconds as defined by the sender.
     * @param string|null $mime_type Optional. MIME type of the file as defined by the sender.
     * @param int|null $file_size Optional. File size in bytes.
     * It can be bigger than 2^31, and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type is safe for storing this value.
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected int $duration,
        protected string|null $mime_type = null,
        protected int|null $file_size = null,
    ) {
        parent::__construct();
    }

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function setFileId(string $file_id): Voice
    {
        $this->file_id = $file_id;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): Voice
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): Voice
    {
        $this->duration = $duration;
        return $this;
    }

    public function getMimeType(): string|null
    {
        return $this->mime_type;
    }

    public function setMimeType(string|null $mime_type): Voice
    {
        $this->mime_type = $mime_type;
        return $this;
    }

    public function getFileSize(): int|null
    {
        return $this->file_size;
    }

    public function setFileSize(int|null $file_size): Voice
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'duration' => $this->duration,
            'mime_type' => $this->mime_type,
            'file_size' => $this->file_size,
        ];
    }
}
