<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputPaidMediaTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * The paid media to send is a live photo.
 *
 * @link https://core.telegram.org/bots/api#inputpaidmedialivephoto
 */
#[BuildIf(new FieldIsChecker('type', InputPaidMediaTypeEnum::LivePhoto->value))]
final class InputPaidMediaLivePhoto extends AbstractInputPaidMedia
{
    /**
     * @param Filename|Url|string $media Video of the live photo to send. Pass a file_id to send a file that exists on the Telegram
     * servers (recommended) or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name>
     * name. More information on Sending Files ». Sending live photos by a URL is currently unsupported.
     * @param string $photo The static photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended)
     * or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More
     * information on Sending Files ». Sending live photos by a URL is currently unsupported.
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected string $photo,
    ) {
        parent::__construct(
            InputPaidMediaTypeEnum::LivePhoto,
        );
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
     * @return InputPaidMediaLivePhoto
     */
    public function setMedia(Filename|Url|string $media): InputPaidMediaLivePhoto
    {
        $this->media = $media;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     *
     * @return InputPaidMediaLivePhoto
     */
    public function setPhoto(string $photo): InputPaidMediaLivePhoto
    {
        $this->photo = $photo;
        return $this;
    }
}
