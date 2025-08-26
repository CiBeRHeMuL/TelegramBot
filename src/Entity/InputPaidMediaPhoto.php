<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputPaidMediaTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * The paid media to send is a photo.
 *
 * @link https://core.telegram.org/bots/api#inputpaidmediaphoto
 */
#[BuildIf(new FieldIsChecker('type', InputPaidMediaTypeEnum::Photo->value))]
final class InputPaidMediaPhoto extends AbstractInputPaidMedia
{
    /**
     * @param Filename|Url|string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one
     * using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        protected Filename|Url|string $media,
    ) {
        parent::__construct(InputPaidMediaTypeEnum::Photo);
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
     * @return InputPaidMediaPhoto
     */
    public function setMedia(Filename|Url|string $media): InputPaidMediaPhoto
    {
        $this->media = $media;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'media' => ($this->media instanceof Url)
                ? $this->media->getUrl()
                : $this->media,
            'type' => $this->type->value,
        ];
    }
}
