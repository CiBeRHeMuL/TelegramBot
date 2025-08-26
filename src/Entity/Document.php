<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 *
 * @see https://core.telegram.org/bots/api#photosize photos
 * @see https://core.telegram.org/bots/api#voice voice messages
 * @see https://core.telegram.org/bots/api#audio audio files
 * @link https://core.telegram.org/bots/api#document
 */
final class Document implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different
     * bots. Can't be used to download or reuse the file.
     * @param PhotoSize|null $thumbnail Optional. Document thumbnail as defined by the sender
     * @param string|null $file_name Optional. Original filename as defined by the sender
     * @param string|null $mime_type Optional. MIME type of the file as defined by the sender
     * @param int|null $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
     * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
     * float type are safe for storing this value.
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected PhotoSize|null $thumbnail = null,
        protected string|null $file_name = null,
        protected string|null $mime_type = null,
        protected int|null $file_size = null,
    ) {
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
     * @return Document
     */
    public function setFileId(string $file_id): Document
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
     * @return Document
     */
    public function setFileUniqueId(string $file_unique_id): Document
    {
        $this->file_unique_id = $file_unique_id;
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
     * @return Document
     */
    public function setThumbnail(PhotoSize|null $thumbnail): Document
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
     * @return Document
     */
    public function setFileName(string|null $file_name): Document
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
     * @return Document
     */
    public function setMimeType(string|null $mime_type): Document
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
     * @return Document
     */
    public function setFileSize(int|null $file_size): Document
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'thumbnail' => $this->thumbnail?->toArray(),
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'file_size' => $this->file_size,
        ];
    }
}
