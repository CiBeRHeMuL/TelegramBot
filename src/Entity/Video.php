<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represents a video file.
 *
 * @link https://core.telegram.org/bots/api#video
 */
final class Video implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different
     * bots. Can't be used to download or reuse the file.
     * @param int $width Video width as defined by the sender
     * @param int $height Video height as defined by the sender
     * @param int $duration Duration of the video in seconds as defined by the sender
     * @param PhotoSize|null $thumbnail Optional. Video thumbnail
     * @param string|null $file_name Optional. Original filename as defined by the sender
     * @param string|null $mime_type Optional. MIME type of the file as defined by the sender
     * @param int|null $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
     * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
     * float type are safe for storing this value.
     * @param PhotoSize[]|null $cover Optional. Available sizes of the cover of the video in the message
     * @param int|null $start_timestamp Optional. Timestamp in seconds from which the video will play in the message
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected int $width,
        protected int $height,
        protected int $duration,
        protected ?PhotoSize $thumbnail = null,
        protected ?string $file_name = null,
        protected ?string $mime_type = null,
        protected ?int $file_size = null,
        #[ArrayType(PhotoSize::class)]
        protected ?array $cover = null,
        protected ?int $start_timestamp = null,
    ) {}

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @param string $file_id
     *
     * @return Video
     */
    public function setFileId(string $file_id): Video
    {
        $this->file_id = $file_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    /**
     * @param string $file_unique_id
     *
     * @return Video
     */
    public function setFileUniqueId(string $file_unique_id): Video
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return Video
     */
    public function setWidth(int $width): Video
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return Video
     */
    public function setHeight(int $height): Video
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     *
     * @return Video
     */
    public function setDuration(int $duration): Video
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize|null $thumbnail
     *
     * @return Video
     */
    public function setThumbnail(?PhotoSize $thumbnail): Video
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    /**
     * @param string|null $file_name
     *
     * @return Video
     */
    public function setFileName(?string $file_name): Video
    {
        $this->file_name = $file_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mime_type;
    }

    /**
     * @param string|null $mime_type
     *
     * @return Video
     */
    public function setMimeType(?string $mime_type): Video
    {
        $this->mime_type = $mime_type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->file_size;
    }

    /**
     * @param int|null $file_size
     *
     * @return Video
     */
    public function setFileSize(?int $file_size): Video
    {
        $this->file_size = $file_size;
        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getCover(): ?array
    {
        return $this->cover;
    }

    /**
     * @param PhotoSize[]|null $cover
     *
     * @return Video
     */
    public function setCover(?array $cover): Video
    {
        $this->cover = $cover;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStartTimestamp(): ?int
    {
        return $this->start_timestamp;
    }

    /**
     * @param int|null $start_timestamp
     *
     * @return Video
     */
    public function setStartTimestamp(?int $start_timestamp): Video
    {
        $this->start_timestamp = $start_timestamp;
        return $this;
    }
}
