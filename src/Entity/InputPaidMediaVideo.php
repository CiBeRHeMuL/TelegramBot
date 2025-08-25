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
 *
 * @link https://core.telegram.org/bots/api#inputpaidmediavideo
 */
#[BuildIf(new FieldIsChecker('type', InputPaidMediaTypeEnum::Video->value))]
class InputPaidMediaVideo extends AbstractInputPaidMedia
{
    /**
     * @param Filename|Url|string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one
     * using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param int|null $duration Optional. Video duration in seconds
     * @param int|null $height Optional. Video height
     * @param bool|null $supports_streaming Optional. Pass True if the uploaded video is suitable for streaming
     * @param Filename|Url|string|null $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for
     * the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width
     * and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused
     * and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using
     * multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param int|null $width Optional. Video width
     * @param Filename|Url|string|null $cover Optional. Cover for the video in the message. Pass a file_id to send a file that exists
     * on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     * to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param int|null $start_timestamp Optional. Start timestamp for the video in the message
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
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
     * @return InputPaidMediaVideo
     */
    public function setMedia(Filename|Url|string $media): InputPaidMediaVideo
    {
        $this->media = $media;
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
     * @return InputPaidMediaVideo
     */
    public function setDuration(int|null $duration): InputPaidMediaVideo
    {
        $this->duration = $duration;
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
     * @return InputPaidMediaVideo
     */
    public function setHeight(int|null $height): InputPaidMediaVideo
    {
        $this->height = $height;
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
     * @return InputPaidMediaVideo
     */
    public function setSupportsStreaming(bool|null $supports_streaming): InputPaidMediaVideo
    {
        $this->supports_streaming = $supports_streaming;
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
     * @return InputPaidMediaVideo
     */
    public function setThumbnail(Filename|Url|string|null $thumbnail): InputPaidMediaVideo
    {
        $this->thumbnail = $thumbnail;
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
     * @return InputPaidMediaVideo
     */
    public function setWidth(int|null $width): InputPaidMediaVideo
    {
        $this->width = $width;
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
     * @return InputPaidMediaVideo
     */
    public function setCover(Filename|Url|string|null $cover): InputPaidMediaVideo
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
     * @return InputPaidMediaVideo
     */
    public function setStartTimestamp(int|null $start_timestamp): InputPaidMediaVideo
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
            'duration' => $this->duration,
            'height' => $this->height,
            'supports_streaming' => $this->supports_streaming,
            'thumbnail' => ($this->thumbnail instanceof Url)
                ? $this->thumbnail->getUrl()
                : $this->thumbnail,
            'width' => $this->width,
            'cover' => ($this->cover instanceof Url)
                ? $this->cover->getUrl()
                : $this->cover,
            'start_timestamp' => $this->start_timestamp,
            'type' => $this->type->value,
        ];
    }
}
