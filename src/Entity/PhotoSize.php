<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 * @link https://core.telegram.org/bots/api#photosize
 */
class PhotoSize implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file.
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     * @param int $width Photo width.
     * @param int $height Photo height.
     * @param int|null $file_size Optional. File size in bytes.
     */
    public function __construct(
        private string $file_id,
        private string $file_unique_id,
        private int $width,
        private int $height,
        private int|null $file_size = null,
    ) {
    }

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function setFileId(string $file_id): PhotoSize
    {
        $this->file_id = $file_id;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): PhotoSize
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): PhotoSize
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): PhotoSize
    {
        $this->height = $height;
        return $this;
    }

    public function getFileSize(): int|null
    {
        return $this->file_size;
    }

    public function setFileSize(int|null $file_size): PhotoSize
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
            'file_size' => $this->file_size,
        ];
    }
}
