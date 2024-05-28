<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Represents a video to be sent.
 * @link https://core.telegram.org/bots/api#inputmediavideo
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Video->value))]
class InputMediaVideo extends AbstractInputMedia
{
    /**
     * @param Filename|Url|string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet,
     * or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
     * More information on Sending Files »
     * @param Filename|Url|string|null $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is
     * supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size.
     * A thumbnail's width and height should not
     * exceed 320. Ignored if the file is not uploaded using multipart/form-data.
     * Thumbnails can't be reused and can be only uploaded as a new
     * file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded
     * using multipart/form-data under <file_attach_name>. More
     * information on Sending Files »
     * @param string|null $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options for more
     * details.
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
     * parse_mode
     * @param int|null $width Optional. Video width
     * @param int|null $height Optional. Video height
     * @param int|null $duration Optional. Video duration in seconds
     * @param bool|null $supports_streaming Optional. Pass True if the uploaded video is suitable for streaming
     * @param bool|null $has_spoiler Optional. Pass True if the video needs to be covered with a spoiler animation
     */
    public function __construct(
        private Filename|Url|string $media,
        private Filename|Url|string|null $thumbnail = null,
        private ?string $caption = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        #[ArrayType(MessageEntity::class)] private ?array $caption_entities = null,
        private ?int $width = null,
        private ?int $height = null,
        private ?int $duration = null,
        private ?bool $supports_streaming = null,
        private ?bool $has_spoiler = null
    ) {
        parent::__construct(InputMediaTypeEnum::Video);
    }

    public function getMedia(): Filename|string|Url
    {
        return $this->media;
    }

    public function setMedia(Filename|Url|string $media): InputMediaVideo
    {
        $this->media = $media;
        return $this;
    }

    public function getThumbnail(): Filename|string|Url|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Filename|Url|string|null $thumbnail): InputMediaVideo
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InputMediaVideo
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputMediaVideo
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InputMediaVideo
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getWidth(): int|null
    {
        return $this->width;
    }

    public function setWidth(int|null $width): InputMediaVideo
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): int|null
    {
        return $this->height;
    }

    public function setHeight(int|null $height): InputMediaVideo
    {
        $this->height = $height;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(int|null $duration): InputMediaVideo
    {
        $this->duration = $duration;
        return $this;
    }

    public function getSupportsStreaming(): bool|null
    {
        return $this->supports_streaming;
    }

    public function setSupportsStreaming(bool|null $supports_streaming): InputMediaVideo
    {
        $this->supports_streaming = $supports_streaming;
        return $this;
    }

    public function getHasSpoiler(): bool|null
    {
        return $this->has_spoiler;
    }

    public function setHasSpoiler(bool|null $has_spoiler): InputMediaVideo
    {
        $this->has_spoiler = $has_spoiler;
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
            'thumbnail' => ($this->thumbnail instanceof Url)
                ? $this->thumbnail->getUrl()
                : $this->thumbnail,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'width' => $this->width,
            'height' => $this->height,
            'duration' => $this->duration,
            'supports_streaming' => $this->supports_streaming,
            'has_spoiler' => $this->has_spoiler,
        ];
    }
}
