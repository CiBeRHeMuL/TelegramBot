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
 * Represents a live photo to be sent.
 *
 * @link https://core.telegram.org/bots/api#inputmedialivephoto
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::LivePhoto->value))]
final class InputMediaLivePhoto extends AbstractInputMedia implements InputPollMediaInterface, InputPollOptionMediaInterface
{
    /**
     * @param Filename|Url|string $media Video of the live photo to send. Pass a file_id to send a file that exists on the Telegram
     * servers (recommended) or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name>
     * name. More information on Sending Files ». Sending live photos by a URL is currently unsupported.
     * @param string $photo The static photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended)
     * or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More
     * information on Sending Files ». Sending live photos by a URL is currently unsupported.
     * @param string|null $caption Optional. Caption of the live photo to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param bool|null $has_spoiler Optional. Pass True if the live photo needs to be covered with a spoiler animation
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the live photo caption. See formatting
     * options for more details.
     * @param bool|null $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected string $photo,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?bool $has_spoiler = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?bool $show_caption_above_media = null,
    ) {
        parent::__construct(
            InputMediaTypeEnum::LivePhoto,
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
     * @return InputMediaLivePhoto
     */
    public function setMedia(Filename|Url|string $media): InputMediaLivePhoto
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
     * @return InputMediaLivePhoto
     */
    public function setPhoto(string $photo): InputMediaLivePhoto
    {
        $this->photo = $photo;
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
     * @return InputMediaLivePhoto
     */
    public function setCaption(?string $caption): InputMediaLivePhoto
    {
        $this->caption = $caption;
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
     * @return InputMediaLivePhoto
     */
    public function setCaptionEntities(?array $caption_entities): InputMediaLivePhoto
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->has_spoiler;
    }

    /**
     * @param bool|null $has_spoiler
     *
     * @return InputMediaLivePhoto
     */
    public function setHasSpoiler(?bool $has_spoiler): InputMediaLivePhoto
    {
        $this->has_spoiler = $has_spoiler;
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
     * @return InputMediaLivePhoto
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InputMediaLivePhoto
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    /**
     * @param bool|null $show_caption_above_media
     *
     * @return InputMediaLivePhoto
     */
    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): InputMediaLivePhoto
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }
}
