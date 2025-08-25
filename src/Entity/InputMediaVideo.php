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
 * Represents a video to be sent.
 *
 * @link https://core.telegram.org/bots/api#inputmediavideo
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Video->value))]
class InputMediaVideo extends AbstractInputMedia
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
     * @param string|null $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options
     * for more details.
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param int|null $width Optional. Video width
     * @param int|null $height Optional. Video height
     * @param int|null $duration Optional. Video duration in seconds
     * @param bool|null $supports_streaming Optional. Pass True if the uploaded video is suitable for streaming
     * @param bool|null $has_spoiler Optional. Pass True if the video needs to be covered with a spoiler animation
     * @param bool|null $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
     * @param Filename|Url|string|null $cover Optional. Cover for the video in the message. Pass a file_id to send a file that exists
     * on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     * to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param int|null $start_timestamp Optional. Start timestamp for the video in the message
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected Filename|Url|string|null $thumbnail = null,
        protected string|null $caption = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $caption_entities = null,
        protected int|null $width = null,
        protected int|null $height = null,
        protected int|null $duration = null,
        protected bool|null $supports_streaming = null,
        protected bool|null $has_spoiler = null,
        protected bool|null $show_caption_above_media = null,
        protected Filename|Url|string|null $cover = null,
        protected int|null $start_timestamp = null,
    ) {
        parent::__construct(InputMediaTypeEnum::Video);
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
     * @return InputMediaVideo
     */
    public function setMedia(Filename|Url|string $media): InputMediaVideo
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
     * @return InputMediaVideo
     */
    public function setThumbnail(Filename|Url|string|null $thumbnail): InputMediaVideo
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): string|null
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     *
     * @return InputMediaVideo
     */
    public function setCaption(string|null $caption): InputMediaVideo
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $parse_mode
     *
     * @return InputMediaVideo
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputMediaVideo
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    /**
     * @param MessageEntity[]|null $caption_entities
     *
     * @return InputMediaVideo
     */
    public function setCaptionEntities(array|null $caption_entities): InputMediaVideo
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): int|null
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     *
     * @return InputMediaVideo
     */
    public function setWidth(int|null $width): InputMediaVideo
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): int|null
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     *
     * @return InputMediaVideo
     */
    public function setHeight(int|null $height): InputMediaVideo
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): int|null
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     *
     * @return InputMediaVideo
     */
    public function setDuration(int|null $duration): InputMediaVideo
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSupportsStreaming(): bool|null
    {
        return $this->supports_streaming;
    }

    /**
     * @param bool|null $supports_streaming
     *
     * @return InputMediaVideo
     */
    public function setSupportsStreaming(bool|null $supports_streaming): InputMediaVideo
    {
        $this->supports_streaming = $supports_streaming;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasSpoiler(): bool|null
    {
        return $this->has_spoiler;
    }

    /**
     * @param bool|null $has_spoiler
     *
     * @return InputMediaVideo
     */
    public function setHasSpoiler(bool|null $has_spoiler): InputMediaVideo
    {
        $this->has_spoiler = $has_spoiler;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): bool|null
    {
        return $this->show_caption_above_media;
    }

    /**
     * @param bool|null $show_caption_above_media
     *
     * @return InputMediaVideo
     */
    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): InputMediaVideo
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    /**
     * @return Filename|Url|string|null
     */
    public function getCover(): Filename|Url|string|null
    {
        return $this->cover;
    }

    /**
     * @param Filename|Url|string|null $cover
     *
     * @return InputMediaVideo
     */
    public function setCover(Filename|Url|string|null $cover): InputMediaVideo
    {
        $this->cover = $cover;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStartTimestamp(): int|null
    {
        return $this->start_timestamp;
    }

    /**
     * @param int|null $start_timestamp
     *
     * @return InputMediaVideo
     */
    public function setStartTimestamp(int|null $start_timestamp): InputMediaVideo
    {
        $this->start_timestamp = $start_timestamp;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'media' => ($this->media instanceof Url)
                ? $this->media->getUrl()
                : $this->media,
            'thumbnail' => ($this->thumbnail instanceof Url)
                ? $this->thumbnail->getUrl()
                : $this->thumbnail,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode?->value,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->caption_entities,
                )
                : null,
            'width' => $this->width,
            'height' => $this->height,
            'duration' => $this->duration,
            'supports_streaming' => $this->supports_streaming,
            'has_spoiler' => $this->has_spoiler,
            'show_caption_above_media' => $this->show_caption_above_media,
            'cover' => ($this->cover instanceof Url)
                ? $this->cover->getUrl()
                : $this->cover,
            'start_timestamp' => $this->start_timestamp,
            'type' => $this->type->value,
        ];
    }
}
