<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a live photo (video+photo pair).
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#livephoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: LivePhoto, Telegram, Bot API, DTO, livephoto
// STRUCTURE: ▶ ┌file_id,file_unique_id┐ → ◇ video_file_id,video_file_unique_id → ∑ LivePhoto
// region CLASS_LivePhoto

/**
 * This object represents a live photo.
 *
 * @see https://core.telegram.org/bots/api#livephoto
 */
final class LivePhoto implements EntityInterface
{
    /**
     * @param string           $file_id        Identifier for the video file which can be used to download or reuse the file
     * @param string           $file_unique_id Unique identifier for the video file which is supposed to be the same over time and for different
     *                                         bots. Can't be used to download or reuse the file.
     * @param int              $width          Video width as defined by the sender
     * @param int              $height         Video height as defined by the sender
     * @param int              $duration       Duration of the video in seconds as defined by the sender
     * @param int|null         $file_size      Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
     *                                         difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
     *                                         float type are safe for storing this value.
     * @param string|null      $mime_type      Optional. MIME type of the file as defined by the sender
     * @param PhotoSize[]|null $photo          Optional. Available sizes of the corresponding static photo
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected int $width,
        protected int $height,
        protected int $duration,
        protected ?int $file_size = null,
        protected ?string $mime_type = null,
        #[ArrayType(PhotoSize::class)]
        protected ?array $photo = null,
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
     * @return LivePhoto
     */
    public function setFileId(string $file_id): LivePhoto
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
     * @return LivePhoto
     */
    public function setFileUniqueId(string $file_unique_id): LivePhoto
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
     * @return LivePhoto
     */
    public function setWidth(int $width): LivePhoto
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
     * @return LivePhoto
     */
    public function setHeight(int $height): LivePhoto
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
     * @return LivePhoto
     */
    public function setDuration(int $duration): LivePhoto
    {
        $this->duration = $duration;

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
     * @return LivePhoto
     */
    public function setFileSize(?int $file_size): LivePhoto
    {
        $this->file_size = $file_size;

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
     * @return LivePhoto
     */
    public function setMimeType(?string $mime_type): LivePhoto
    {
        $this->mime_type = $mime_type;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[]|null $photo
     *
     * @return LivePhoto
     */
    public function setPhoto(?array $photo): LivePhoto
    {
        $this->photo = $photo;

        return $this;
    }
}

// endregion CLASS_LivePhoto
