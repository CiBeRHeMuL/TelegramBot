<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
 * @link https://core.telegram.org/bots/api#animation
 */
class Animation extends AbstractEntity
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file.
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     * @param int $width Video width as defined by sender.
     * @param int $height Video height as defined by sender.
     * @param int $duration Duration of the video in seconds as defined by sender.
     * @param PhotoSize|null $thumbnail Animation thumbnail as defined by sender.
     * @param string|null $file_name Original animation filename as defined by sender.
     * @param string|null $mime_type MIME type of the file as defined by sender.
     * @param int|null $file_size File size in bytes.
     * It can be bigger than 2^31, and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type is safe for storing this value.
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected int $width,
        protected int $height,
        protected int $duration,
        protected PhotoSize|null $thumbnail = null,
        protected string|null $file_name = null,
        protected string|null $mime_type = null,
        protected int|null $file_size = null,
    ) {
        parent::__construct();
    }

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function setFileId(string $file_id): Animation
    {
        $this->file_id = $file_id;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): Animation
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): Animation
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): Animation
    {
        $this->height = $height;
        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): Animation
    {
        $this->duration = $duration;
        return $this;
    }

    public function getThumbnail(): PhotoSize|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(PhotoSize|null $thumbnail): Animation
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getFileName(): string|null
    {
        return $this->file_name;
    }

    public function setFileName(string|null $file_name): Animation
    {
        $this->file_name = $file_name;
        return $this;
    }

    public function getMimeType(): string|null
    {
        return $this->mime_type;
    }

    public function setMimeType(string|null $mime_type): Animation
    {
        $this->mime_type = $mime_type;
        return $this;
    }

    public function getFileSize(): int|null
    {
        return $this->file_size;
    }

    public function setFileSize(int|null $file_size): Animation
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'width' => $this->width,
            'height' => $this->height,
            'duration' => $this->duration,
            'thumbnail' => $this->thumbnail?->toArray(),
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'file_size' => $this->file_size,
        ];
    }
}
