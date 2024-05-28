<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 * @link https://core.telegram.org/bots/api#videonote
 */
class VideoNote implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file.
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     * @param int $length Video width and height (diameter of the video message) as defined by the sender.
     * @param int $duration Duration of the video in seconds as defined by the sender.
     * @param PhotoSize|null $thumbnail Optional. Video thumbnail.
     * @param int|null $file_size Optional. File size in bytes.
     */
    public function __construct(
        private string $file_id,
        private string $file_unique_id,
        private int $length,
        private int $duration,
        private PhotoSize|null $thumbnail = null,
        private int|null $file_size = null,
    ) {
    }

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function setFileId(string $file_id): VideoNote
    {
        $this->file_id = $file_id;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): VideoNote
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): VideoNote
    {
        $this->length = $length;
        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): VideoNote
    {
        $this->duration = $duration;
        return $this;
    }

    public function getThumbnail(): PhotoSize|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(PhotoSize|null $thumbnail): VideoNote
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getFileSize(): int|null
    {
        return $this->file_size;
    }

    public function setFileSize(int|null $file_size): VideoNote
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'length' => $this->length,
            'duration' => $this->duration,
            'thumbnail' => $this->thumbnail?->toArray(),
            'file_size' => $this->file_size,
        ];
    }
}
