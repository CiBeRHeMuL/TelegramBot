<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents an audio file to be treated as music to be sent.
 *
 * @link https://core.telegram.org/bots/api#inputmediaaudio
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Audio->value))]
final class InputMediaAudio extends AbstractInputMedia
{
    /**
     * @param Filename|Url|string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one
     * using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param Filename|Url|string|null $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for
     * the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width
     * and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused
     * and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using
     * multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param string|null $caption Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the audio caption. See formatting options
     * for more details.
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param int|null $duration Optional. Duration of the audio in seconds
     * @param string|null $performer Optional. Performer of the audio
     * @param string|null $title Optional. Title of the audio
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected Filename|Url|string|null $thumbnail = null,
        protected ?string $caption = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?int $duration = null,
        protected ?string $performer = null,
        protected ?string $title = null,
    ) {
        parent::__construct(InputMediaTypeEnum::Audio);
    }

    /**
     * @return Filename|Url|string
     */
    public function getMedia(): Filename|Url|string
    {
        return $this->media;
    }

    /**
     * @param Filename|Url|string $media
     *
     * @return InputMediaAudio
     */
    public function setMedia(Filename|Url|string $media): InputMediaAudio
    {
        $this->media = $media;
        return $this;
    }

    /**
     * @return Filename|Url|string|null
     */
    public function getThumbnail(): Filename|Url|string|null
    {
        return $this->thumbnail;
    }

    /**
     * @param Filename|Url|string|null $thumbnail
     *
     * @return InputMediaAudio
     */
    public function setThumbnail(Filename|Url|string|null $thumbnail): InputMediaAudio
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     *
     * @return InputMediaAudio
     */
    public function setCaption(?string $caption): InputMediaAudio
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $parse_mode
     *
     * @return InputMediaAudio
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InputMediaAudio
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    /**
     * @param MessageEntity[]|null $caption_entities
     *
     * @return InputMediaAudio
     */
    public function setCaptionEntities(?array $caption_entities): InputMediaAudio
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     *
     * @return InputMediaAudio
     */
    public function setDuration(?int $duration): InputMediaAudio
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     *
     * @return InputMediaAudio
     */
    public function setPerformer(?string $performer): InputMediaAudio
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return InputMediaAudio
     */
    public function setTitle(?string $title): InputMediaAudio
    {
        $this->title = $title;
        return $this;
    }
}
