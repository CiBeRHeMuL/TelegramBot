<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents a video file.
 *
 * @link https://core.telegram.org/bots/api#video
 */
class Video extends AbstractEntity
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
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
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
        #[ArrayType(PhotoSize::class)]
        protected array|null $cover = null,
        protected int|null $start_timestamp = null,
    ) {
        parent::__construct();
    }

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
    public function getThumbnail(): PhotoSize|null
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize|null $thumbnail
     *
     * @return Video
     */
    public function setThumbnail(PhotoSize|null $thumbnail): Video
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName(): string|null
    {
        return $this->file_name;
    }

    /**
     * @param string|null $file_name
     *
     * @return Video
     */
    public function setFileName(string|null $file_name): Video
    {
        $this->file_name = $file_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMimeType(): string|null
    {
        return $this->mime_type;
    }

    /**
     * @param string|null $mime_type
     *
     * @return Video
     */
    public function setMimeType(string|null $mime_type): Video
    {
        $this->mime_type = $mime_type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): int|null
    {
        return $this->file_size;
    }

    /**
     * @param int|null $file_size
     *
     * @return Video
     */
    public function setFileSize(int|null $file_size): Video
    {
        $this->file_size = $file_size;
        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getCover(): array|null
    {
        return $this->cover;
    }

    /**
     * @param PhotoSize[]|null $cover
     *
     * @return Video
     */
    public function setCover(array|null $cover): Video
    {
        $this->cover = $cover;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStartTimestamp(): int|null
    {
        return $this->start_timestamp;
    }

    /**
     * @param int|null $start_timestamp
     *
     * @return Video
     */
    public function setStartTimestamp(int|null $start_timestamp): Video
    {
        $this->start_timestamp = $start_timestamp;
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
            'cover' => $this->cover !== null
                ? array_map(fn(PhotoSize $e) => $e->toArray(), $this->cover)
                : null,
            'start_timestamp' => $this->start_timestamp,
        ];
    }
}
