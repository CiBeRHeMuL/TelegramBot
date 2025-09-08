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
 * Represents a general file to be sent.
 *
 * @link https://core.telegram.org/bots/api#inputmediadocument
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Document->value))]
final class InputMediaDocument extends AbstractInputMedia
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
     * @param string|null $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the document caption. See formatting
     * options for more details.
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param bool|null $disable_content_type_detection Optional. Disables automatic server-side content type detection for files
     * uploaded using multipart/form-data. Always True, if the document is sent as part of an album.
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
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
        protected ?bool $disable_content_type_detection = null,
    ) {
        parent::__construct(InputMediaTypeEnum::Document);
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
     * @return InputMediaDocument
     */
    public function setMedia(Filename|Url|string $media): InputMediaDocument
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
     * @return InputMediaDocument
     */
    public function setThumbnail(Filename|Url|string|null $thumbnail): InputMediaDocument
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
     * @return InputMediaDocument
     */
    public function setCaption(?string $caption): InputMediaDocument
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
     * @return InputMediaDocument
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InputMediaDocument
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
     * @return InputMediaDocument
     */
    public function setCaptionEntities(?array $caption_entities): InputMediaDocument
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDisableContentTypeDetection(): ?bool
    {
        return $this->disable_content_type_detection;
    }

    /**
     * @param bool|null $disable_content_type_detection
     *
     * @return InputMediaDocument
     */
    public function setDisableContentTypeDetection(?bool $disable_content_type_detection): InputMediaDocument
    {
        $this->disable_content_type_detection = $disable_content_type_detection;
        return $this;
    }
}
