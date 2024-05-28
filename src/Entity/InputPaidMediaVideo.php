<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputPaidMediaTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * The paid media to send is a video.
 * @link https://core.telegram.org/bots/api#inputpaidmediavideo
 */
#[BuildIf(new FieldIsChecker('type', InputPaidMediaTypeEnum::Video->value))]
class InputPaidMediaVideo extends AbstractInputPaidMedia
{
    /**
     * @param Filename|Url|string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an
     * HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using
     * multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param int|null $duration Optional. Video duration in seconds
     * @param int|null $height Optional. Video height
     * @param bool|null $supports_streaming Optional. Pass True if the uploaded video is suitable for streaming
     * @param Filename|Url|string|null $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for
     * the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width
     * and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused
     * and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using
     * multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param int|null $width Optional. Video width
     * @param Filename|Url|string|null $cover Optional. Cover for the video in the message.
     *  Pass a file_id to send a file that exists on the Telegram servers (recommended),
     *  pass an HTTP URL for Telegram to get a file from the Internet,
     *  or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
     * @param int|null $start_timestamp Optional. Start timestamp for the video in the message
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected int|null $duration = null,
        protected int|null $height = null,
        protected bool|null $supports_streaming = null,
        protected Filename|Url|string|null $thumbnail = null,
        protected int|null $width = null,
        protected Filename|Url|string|null $cover = null,
        protected int|null $start_timestamp = null,
    ) {
        parent::__construct(InputPaidMediaTypeEnum::Video);
    }

    public function getMedia(): Filename|Url|string
    {
        return $this->media;
    }

    public function setMedia(Filename|Url|string $media): InputPaidMediaVideo
    {
        $this->media = $media;
        return $this;
    }

    public function getDuration(): int|null
    {
        return $this->duration;
    }

    public function setDuration(int|null $duration): InputPaidMediaVideo
    {
        $this->duration = $duration;
        return $this;
    }

    public function getHeight(): int|null
    {
        return $this->height;
    }

    public function setHeight(int|null $height): InputPaidMediaVideo
    {
        $this->height = $height;
        return $this;
    }

    public function getSupportsStreaming(): bool|null
    {
        return $this->supports_streaming;
    }

    public function setSupportsStreaming(bool|null $supports_streaming): InputPaidMediaVideo
    {
        $this->supports_streaming = $supports_streaming;
        return $this;
    }

    public function getThumbnail(): Filename|Url|string|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Filename|Url|string|null $thumbnail): InputPaidMediaVideo
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getWidth(): int|null
    {
        return $this->width;
    }

    public function setWidth(int|null $width): InputPaidMediaVideo
    {
        $this->width = $width;
        return $this;
    }

    public function getCover(): Filename|string|Url|null
    {
        return $this->cover;
    }

    public function setCover(Filename|string|Url|null $cover): void
    {
        $this->cover = $cover;
    }

    public function getStartTimestamp(): ?int
    {
        return $this->start_timestamp;
    }

    public function setStartTimestamp(?int $start_timestamp): void
    {
        $this->start_timestamp = $start_timestamp;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type,
            'media' => ($this->media instanceof Url)
                ? $this->media->getUrl()
                : $this->media,
            'duration' => $this->duration,
            'height' => $this->height,
            'supports_streaming' => $this->supports_streaming,
            'thumbnail' => ($this->thumbnail instanceof Url)
                ? $this->thumbnail->getUrl()
                : $this->thumbnail,
            'width' => $this->width,
            'cover' => $this->cover
                ? (($this->cover instanceof Url) ? $this->cover->getUrl() : $this->cover)
                : null,
            'start_timestamp' => $this->start_timestamp,
        ];
    }
}
