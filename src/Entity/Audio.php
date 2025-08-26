<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @link https://core.telegram.org/bots/api#audio
 */
final class Audio implements EntityInterface
{
    /**
     * @param int $duration Duration of the audio in seconds as defined by the sender
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different
     * bots. Can't be used to download or reuse the file.
     * @param string|null $performer Optional. Performer of the audio as defined by the sender or by audio tags
     * @param string|null $title Optional. Title of the audio as defined by the sender or by audio tags
     * @param PhotoSize|null $thumbnail Optional. Thumbnail of the album cover to which the music file belongs
     * @param string|null $file_name Optional. Original filename as defined by the sender
     * @param string|null $mime_type Optional. MIME type of the file as defined by the sender
     * @param int|null $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
     * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
     * float type are safe for storing this value.
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        protected int $duration,
        protected string $file_id,
        protected string $file_unique_id,
        protected string|null $performer = null,
        protected string|null $title = null,
        protected PhotoSize|null $thumbnail = null,
        protected string|null $file_name = null,
        protected string|null $mime_type = null,
        protected int|null $file_size = null,
    ) {
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
     * @return Audio
     */
    public function setDuration(int $duration): Audio
    {
        $this->duration = $duration;
        return $this;
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
     * @return Audio
     */
    public function setFileId(string $file_id): Audio
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
     * @return Audio
     */
    public function setFileUniqueId(string $file_unique_id): Audio
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): string|null
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     *
     * @return Audio
     */
    public function setPerformer(string|null $performer): Audio
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): string|null
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return Audio
     */
    public function setTitle(string|null $title): Audio
    {
        $this->title = $title;
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
     * @return Audio
     */
    public function setThumbnail(PhotoSize|null $thumbnail): Audio
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
     * @return Audio
     */
    public function setFileName(string|null $file_name): Audio
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
     * @return Audio
     */
    public function setMimeType(string|null $mime_type): Audio
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
     * @return Audio
     */
    public function setFileSize(int|null $file_size): Audio
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'duration' => $this->duration,
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'performer' => $this->performer,
            'title' => $this->title,
            'thumbnail' => $this->thumbnail?->toArray(),
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'file_size' => $this->file_size,
        ];
    }
}
