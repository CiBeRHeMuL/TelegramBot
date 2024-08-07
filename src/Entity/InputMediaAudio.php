<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Represents an audio file to be treated as music to be sent.
 * @link https://core.telegram.org/bots/api#inputmediaaudio
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Audio->value))]
class InputMediaAudio extends AbstractInputMedia
{
    /**
     * @param Filename|Url|string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet,
     * or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
     * More information on Sending Files »
     * @param Filename|Url|string|null $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is
     * supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not
     * exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new
     * file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More
     * information on Sending Files »
     * @param string|null $caption Optional. Caption of the audio to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the audio caption. See formatting options for more
     * details.
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
     * parse_mode
     * @param int|null $duration Optional. Duration of the audio in seconds
     * @param string|null $performer Optional. Performer of the audio
     * @param string|null $title Optional. Title of the audio
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected Filename|Url|string|null $thumbnail = null,
        protected string|null $caption = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        #[ArrayType(MessageEntity::class)] protected array|null $caption_entities = null,
        protected int|null $duration = null,
        protected string|null $performer = null,
        protected string|null $title = null,
    ) {
        parent::__construct(InputMediaTypeEnum::Audio);
    }

    public function getMedia(): Filename|string|Url
    {
        return $this->media;
    }

    public function setMedia(Filename|Url|string $media): InputMediaAudio
    {
        $this->media = $media;
        return $this;
    }

    public function getThumbnail(): Filename|string|Url|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Filename|Url|string|null $thumbnail): InputMediaAudio
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InputMediaAudio
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputMediaAudio
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InputMediaAudio
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(int|null $duration): InputMediaAudio
    {
        $this->duration = $duration;
        return $this;
    }

    public function getPerformer(): string|null
    {
        return $this->performer;
    }

    public function setPerformer(string|null $performer): InputMediaAudio
    {
        $this->performer = $performer;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): InputMediaAudio
    {
        $this->title = $title;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'media' => ($this->media instanceof Url)
                ? $this->media->getUrl()
                : $this->media,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode?->value,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'duration' => $this->duration,
            'performer' => $this->performer,
            'title' => $this->title,
            'thumbnail' => ($this->thumbnail instanceof Url)
                ? $this->thumbnail->getUrl()
                : $this->thumbnail,
        ];
    }
}
