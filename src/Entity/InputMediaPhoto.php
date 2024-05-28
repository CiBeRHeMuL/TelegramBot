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
 * Represents a photo to be sent.
 * @link https://core.telegram.org/bots/api#inputmediaphoto
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Photo->value))]
class InputMediaPhoto extends AbstractInputMedia
{
    /**
     * @param string|Filename|Url $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet,
     * or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name.
     * More information on Sending Files »
     * @param string|null $caption Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the photo caption.
     * See formatting options for more details.
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption,
     * which can be specified instead of parse_mode
     * @param bool|null $has_spoiler Optional. Pass True if the photo needs to be covered with a spoiler animation
     */
    public function __construct(
        private string|Filename|Url $media,
        private ?string $caption = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        #[ArrayType(MessageEntity::class)] private ?array $caption_entities = null,
        private ?bool $has_spoiler = null
    ) {
        parent::__construct(InputMediaTypeEnum::Photo);
    }

    public function getMedia(): Filename|string|Url
    {
        return $this->media;
    }

    public function setMedia(Filename|Url|string $media): InputMediaPhoto
    {
        $this->media = $media;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InputMediaPhoto
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputMediaPhoto
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InputMediaPhoto
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getHasSpoiler(): bool|null
    {
        return $this->has_spoiler;
    }

    public function setHasSpoiler(bool|null $has_spoiler): InputMediaPhoto
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
            'caption_entities' => $this->caption_entities !== null
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'has_spoiler' => $this->has_spoiler,
        ];
    }
}
