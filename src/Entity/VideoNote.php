<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a video message (available in Telegram apps as of v.4.0).
 *
 * @see https://telegram.org/blog/video-messages-and-telescope v.4.0
 * @link https://core.telegram.org/bots/api#videonote
 */
final class VideoNote implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different
     * bots. Can't be used to download or reuse the file.
     * @param int $length Video width and height (diameter of the video message) as defined by the sender
     * @param int $duration Duration of the video in seconds as defined by the sender
     * @param PhotoSize|null $thumbnail Optional. Video thumbnail
     * @param int|null $file_size Optional. File size in bytes
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected int $length,
        protected int $duration,
        protected ?PhotoSize $thumbnail = null,
        protected ?int $file_size = null,
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
     * @return VideoNote
     */
    public function setFileId(string $file_id): VideoNote
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
     * @return VideoNote
     */
    public function setFileUniqueId(string $file_unique_id): VideoNote
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     *
     * @return VideoNote
     */
    public function setLength(int $length): VideoNote
    {
        $this->length = $length;
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
     * @return VideoNote
     */
    public function setDuration(int $duration): VideoNote
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
     * @return VideoNote
     */
    public function setThumbnail(?PhotoSize $thumbnail): VideoNote
    {
        $this->thumbnail = $thumbnail;
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
     * @return VideoNote
     */
    public function setFileSize(?int $file_size): VideoNote
    {
        $this->file_size = $file_size;
        return $this;
    }
}
