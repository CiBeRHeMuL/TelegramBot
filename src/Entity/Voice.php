<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a voice note.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#voice
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Voice, Telegram, Bot API, DTO, voice
// STRUCTURE: ▶ ┌file_id,file_unique_id,duration┐ → ◇ mime_type,file_size → ∑ Voice
// region CLASS_Voice

/**
 * This object represents a voice note.
 *
 * @see https://core.telegram.org/bots/api#voice
 */
final class Voice implements EntityInterface
{
    /**
     * @param string      $file_id        Identifier for this file, which can be used to download or reuse the file
     * @param string      $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different
     *                                    bots. Can't be used to download or reuse the file.
     * @param int         $duration       Duration of the audio in seconds as defined by the sender
     * @param string|null $mime_type      Optional. MIME type of the file as defined by the sender
     * @param int|null    $file_size      Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
     *                                    difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
     *                                    float type are safe for storing this value.
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected int $duration,
        protected ?string $mime_type = null,
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
     * @return Voice
     */
    public function setFileId(string $file_id): Voice
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
     * @return Voice
     */
    public function setFileUniqueId(string $file_unique_id): Voice
    {
        $this->file_unique_id = $file_unique_id;

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
     * @return Voice
     */
    public function setDuration(int $duration): Voice
    {
        $this->duration = $duration;

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
     * @return Voice
     */
    public function setMimeType(?string $mime_type): Voice
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
     * @return Voice
     */
    public function setFileSize(?int $file_size): Voice
    {
        $this->file_size = $file_size;

        return $this;
    }
}

// endregion CLASS_Voice
