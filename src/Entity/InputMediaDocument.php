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
 * Represents a general file to be sent.
 * @link https://core.telegram.org/bots/api#inputmediadocument
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Document->value))]
class InputMediaDocument extends AbstractInputMedia
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
     * @param string|null $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the document caption. See formatting options for more
     * details.
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of
     * parse_mode
     * @param bool|null $disable_content_type_detection Optional. Disables automatic server-side content type detection for files uploaded using
     * multipart/form-data. Always True, if the document is sent as part of an album.
     */
    public function __construct(
        private Filename|Url|string $media,
        private Filename|Url|string|null $thumbnail = null,
        private ?string $caption = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        #[ArrayType(MessageEntity::class)] private ?array $caption_entities = null,
        private ?bool $disable_content_type_detection = null
    ) {
        parent::__construct(InputMediaTypeEnum::Document);
    }

    public function getMedia(): Filename|string|Url
    {
        return $this->media;
    }

    public function setMedia(Filename|Url|string $media): InputMediaDocument
    {
        $this->media = $media;
        return $this;
    }

    public function getThumbnail(): Filename|string|Url|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Filename|Url|string|null $thumbnail): InputMediaDocument
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InputMediaDocument
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputMediaDocument
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InputMediaDocument
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDisableContentTypeDetection(): bool|null
    {
        return $this->disable_content_type_detection;
    }

    public function setDisableContentTypeDetection(bool|null $disable_content_type_detection): InputMediaDocument
    {
        $this->disable_content_type_detection = $disable_content_type_detection;
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
            'disable_content_type_detection' => $this->disable_content_type_detection,
        ];
    }
}
