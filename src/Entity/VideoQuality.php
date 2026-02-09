<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a video file of a specific quality.
 *
 * @link https://core.telegram.org/bots/api#videoquality
 */
final class VideoQuality implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different
     * bots. Can't be used to download or reuse the file.
     * @param int $width Video width
     * @param int $height Video height
     * @param string $codec Codec that was used to encode the video, for example, “h264”, “h265”, or “av01”
     * @param int|null $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
     * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
     * float type are safe for storing this value.
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected int $width,
        protected int $height,
        protected string $codec,
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
     * @return VideoQuality
     */
    public function setFileId(string $file_id): VideoQuality
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
     * @return VideoQuality
     */
    public function setFileUniqueId(string $file_unique_id): VideoQuality
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
     * @return VideoQuality
     */
    public function setWidth(int $width): VideoQuality
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
     * @return VideoQuality
     */
    public function setHeight(int $height): VideoQuality
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodec(): string
    {
        return $this->codec;
    }

    /**
     * @param string $codec
     *
     * @return VideoQuality
     */
    public function setCodec(string $codec): VideoQuality
    {
        $this->codec = $codec;
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
     * @return VideoQuality
     */
    public function setFileSize(?int $file_size): VideoQuality
    {
        $this->file_size = $file_size;
        return $this;
    }
}
