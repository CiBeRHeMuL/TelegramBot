<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

// region CLASS_InputMediaVoiceNote
/**
 * Represents a voice note to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediavoicenote
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::VoiceNote->value))]
final class InputMediaVoiceNote extends AbstractInputMedia
{
    /**
     * @param Filename|Url|string        $media            File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
     *                                                     pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one
     *                                                     using multipart/form-data under <file_attach_name> name. More information on Sending Files »
     * @param string|null                $caption          Optional. Caption of the voice note to be sent, 0-1024 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode       Optional. Mode for parsing entities in the voice note caption. See formatting options
     *                                                     for more details.
     * @param MessageEntity[]|null       $caption_entities Optional. List of special entities that appear in the caption, which can be
     *                                                     specified instead of parse_mode
     * @param int|null                   $duration         Optional. Duration of the voice note in seconds
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected Filename|Url|string $media,
        protected ?string $caption = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?int $duration = null,
    ) {
        parent::__construct(InputMediaTypeEnum::VoiceNote);
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
     * @return InputMediaVoiceNote
     */
    public function setMedia(Filename|Url|string $media): InputMediaVoiceNote
    {
        $this->media = $media;

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
     * @return InputMediaVoiceNote
     */
    public function setCaption(?string $caption): InputMediaVoiceNote
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
     * @return InputMediaVoiceNote
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InputMediaVoiceNote
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
     * @return InputMediaVoiceNote
     */
    public function setCaptionEntities(?array $caption_entities): InputMediaVoiceNote
    {
        $this->caption_entities = $caption_entities;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     *
     * @return InputMediaVoiceNote
     */
    public function setDuration(?int $duration): InputMediaVoiceNote
    {
        $this->duration = $duration;

        return $this;
    }
}

// endregion CLASS_InputMediaVoiceNote
