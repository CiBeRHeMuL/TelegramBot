<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a chat photo.
 * @link https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto implements EntityInterface
{
    /**
     * @param string $small_file_id File identifier of small (160x160) chat photo.
     * This file_id can be used only for photo download and only for as long as the photo is not changed.
     * @param string $small_file_unique_id Unique file identifier of small (160x160) chat photo,
     * which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     * @param string $big_file_id File identifier of big (640x640) chat photo.
     * This file_id can be used only for photo download and only for as long as the photo is not changed.
     * @param string $big_file_unique_id Unique file identifier of big (640x640) chat photo,
     * which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     */
    public function __construct(
        private string $small_file_id,
        private string $small_file_unique_id,
        private string $big_file_id,
        private string $big_file_unique_id,
    ) {
    }

    public function getSmallFileId(): string
    {
        return $this->small_file_id;
    }

    public function setSmallFileId(string $small_file_id): ChatPhoto
    {
        $this->small_file_id = $small_file_id;
        return $this;
    }

    public function getSmallFileUniqueId(): string
    {
        return $this->small_file_unique_id;
    }

    public function setSmallFileUniqueId(string $small_file_unique_id): ChatPhoto
    {
        $this->small_file_unique_id = $small_file_unique_id;
        return $this;
    }

    public function getBigFileId(): string
    {
        return $this->big_file_id;
    }

    public function setBigFileId(string $big_file_id): ChatPhoto
    {
        $this->big_file_id = $big_file_id;
        return $this;
    }

    public function getBigFileUniqueId(): string
    {
        return $this->big_file_unique_id;
    }

    public function setBigFileUniqueId(string $big_file_unique_id): ChatPhoto
    {
        $this->big_file_unique_id = $big_file_unique_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'small_file_id' => $this->small_file_id,
            'small_file_unique_id' => $this->small_file_unique_id,
            'big_file_id' => $this->big_file_id,
            'big_file_unique_id' => $this->big_file_unique_id,
        ];
    }
}
