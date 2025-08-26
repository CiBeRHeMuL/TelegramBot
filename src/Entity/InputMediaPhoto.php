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
 * Represents a photo to be sent.
 *
 * @link https://core.telegram.org/bots/api#inputmediaphoto
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Photo->value))]
final class InputMediaPhoto extends AbstractInputMedia
{
    /**
     * @param Filename|Url|string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     * pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one
     * using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param string|null $caption Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the photo caption. See formatting options
     * for more details.
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param bool|null $has_spoiler Optional. Pass True if the photo needs to be covered with a spoiler animation
     * @param bool|null $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected string|null $caption = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $caption_entities = null,
        protected bool|null $has_spoiler = null,
        protected bool|null $show_caption_above_media = null,
    ) {
        parent::__construct(InputMediaTypeEnum::Photo);
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
     * @return InputMediaPhoto
     */
    public function setMedia(Filename|Url|string $media): InputMediaPhoto
    {
        $this->media = $media;
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
     * @return InputMediaPhoto
     */
    public function setCaption(string|null $caption): InputMediaPhoto
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
     * @return InputMediaPhoto
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputMediaPhoto
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
     * @return InputMediaPhoto
     */
    public function setCaptionEntities(array|null $caption_entities): InputMediaPhoto
    {
        $this->caption_entities = $caption_entities;
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
     * @return InputMediaPhoto
     */
    public function setHasSpoiler(bool|null $has_spoiler): InputMediaPhoto
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
     * @return InputMediaPhoto
     */
    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): InputMediaPhoto
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'media' => ($this->media instanceof Url)
                ? $this->media->getUrl()
                : $this->media,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode?->value,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->caption_entities,
                )
                : null,
            'has_spoiler' => $this->has_spoiler,
            'show_caption_above_media' => $this->show_caption_above_media,
            'type' => $this->type->value,
        ];
    }
}
