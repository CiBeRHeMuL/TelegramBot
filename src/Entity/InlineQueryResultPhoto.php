<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively, you can
 * use input_message_content to send a message with the specified content instead of the photo.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Photo->value),
    new FieldCompareChecker('photo_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultPhoto extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param Url $photo_url A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB
     * @param Url $thumbnail_url URL of the thumbnail for the photo
     * @param string|null $caption Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param string|null $description Optional. Short description of the result
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * photo
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the photo caption. See formatting options
     * for more details.
     * @param int|null $photo_height Optional. Height of the photo
     * @param int|null $photo_width Optional. Width of the photo
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param string|null $title Optional. Title for the result
     * @param bool|null $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards Inline keyboard
     * @see https://core.telegram.org/bots/api#inputmessagecontent InputMessageContent
     */
    public function __construct(
        protected string $id,
        protected Url $photo_url,
        protected Url $thumbnail_url,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?string $description = null,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?int $photo_height = null,
        protected ?int $photo_width = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
        protected ?string $title = null,
        protected ?bool $show_caption_above_media = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Photo);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return InlineQueryResultPhoto
     */
    public function setId(string $id): InlineQueryResultPhoto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Url
     */
    public function getPhotoUrl(): Url
    {
        return $this->photo_url;
    }

    /**
     * @param Url $photo_url
     *
     * @return InlineQueryResultPhoto
     */
    public function setPhotoUrl(Url $photo_url): InlineQueryResultPhoto
    {
        $this->photo_url = $photo_url;
        return $this;
    }

    /**
     * @return Url
     */
    public function getThumbnailUrl(): Url
    {
        return $this->thumbnail_url;
    }

    /**
     * @param Url $thumbnail_url
     *
     * @return InlineQueryResultPhoto
     */
    public function setThumbnailUrl(Url $thumbnail_url): InlineQueryResultPhoto
    {
        $this->thumbnail_url = $thumbnail_url;
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
     * @return InlineQueryResultPhoto
     */
    public function setCaption(?string $caption): InlineQueryResultPhoto
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
     * @return InlineQueryResultPhoto
     */
    public function setCaptionEntities(?array $caption_entities): InlineQueryResultPhoto
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return InlineQueryResultPhoto
     */
    public function setDescription(?string $description): InlineQueryResultPhoto
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return AbstractInputMessageContent|null
     */
    public function getInputMessageContent(): ?AbstractInputMessageContent
    {
        return $this->input_message_content;
    }

    /**
     * @param AbstractInputMessageContent|null $input_message_content
     *
     * @return InlineQueryResultPhoto
     */
    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultPhoto
    {
        $this->input_message_content = $input_message_content;
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
     * @return InlineQueryResultPhoto
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InlineQueryResultPhoto
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoHeight(): ?int
    {
        return $this->photo_height;
    }

    /**
     * @param int|null $photo_height
     *
     * @return InlineQueryResultPhoto
     */
    public function setPhotoHeight(?int $photo_height): InlineQueryResultPhoto
    {
        $this->photo_height = $photo_height;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoWidth(): ?int
    {
        return $this->photo_width;
    }

    /**
     * @param int|null $photo_width
     *
     * @return InlineQueryResultPhoto
     */
    public function setPhotoWidth(?int $photo_width): InlineQueryResultPhoto
    {
        $this->photo_width = $photo_width;
        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return InlineQueryResultPhoto
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultPhoto
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return InlineQueryResultPhoto
     */
    public function setTitle(?string $title): InlineQueryResultPhoto
    {
        $this->title = $title;
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
     * @return InlineQueryResultPhoto
     */
    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): InlineQueryResultPhoto
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }
}
