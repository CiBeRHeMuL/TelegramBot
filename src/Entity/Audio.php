<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 * @link https://core.telegram.org/bots/api#audio
 */
class Audio implements EntityInterface
{
    /**
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file.
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     * @param int $duration Duration of the audio in seconds as defined by sender.
     * @param string|null $performer Performer of the audio as defined by sender or by audio tags.
     * @param string|null $title Title of the audio as defined by sender or by audio tags.
     * @param string|null $fileName Original filename as defined by sender.
     * @param string|null $mimeType MIME type of the file as defined by sender.
     * @param int|null $fileSize File size in bytes.
     * @param PhotoSize|null $thumbnail Thumbnail of the album cover to which the music file belongs.
     */
    public function __construct(
        private string $fileId,
        private string $fileUniqueId,
        private int $duration,
        private string|null $performer = null,
        private string|null $title = null,
        private string|null $fileName = null,
        private string|null $mimeType = null,
        private int|null $fileSize = null,
        private PhotoSize|null $thumbnail = null,
    ) {
    }

    public function getFileId(): string
    {
        return $this->fileId;
    }

    public function setFileId(string $fileId): Audio
    {
        $this->fileId = $fileId;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->fileUniqueId;
    }

    public function setFileUniqueId(string $fileUniqueId): Audio
    {
        $this->fileUniqueId = $fileUniqueId;
        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): Audio
    {
        $this->duration = $duration;
        return $this;
    }

    public function getPerformer(): string|null
    {
        return $this->performer;
    }

    public function setPerformer(string|null $performer): Audio
    {
        $this->performer = $performer;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): Audio
    {
        $this->title = $title;
        return $this;
    }

    public function getFileName(): string|null
    {
        return $this->fileName;
    }

    public function setFileName(string|null $fileName): Audio
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function getMimeType(): string|null
    {
        return $this->mimeType;
    }

    public function setMimeType(string|null $mimeType): Audio
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    public function getFileSize(): int|null
    {
        return $this->fileSize;
    }

    public function setFileSize(int|null $fileSize): Audio
    {
        $this->fileSize = $fileSize;
        return $this;
    }

    public function getThumbnail(): PhotoSize|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(PhotoSize|null $thumbnail): Audio
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'file_id' => $this->fileId,
            'file_unique_id' => $this->fileUniqueId,
            'duration' => $this->duration,
            'performer' => $this->performer,
            'title' => $this->title,
            'file_name' => $this->fileName,
            'mime_type' => $this->mimeType,
            'file_size' => $this->fileSize,
            'thumbnail' => $this->thumbnail?->toArray(),
        ];
    }
}
