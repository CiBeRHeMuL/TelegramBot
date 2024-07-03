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
use stdClass;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively, you can
 * use input_message_content to send a message with the specified content instead of the photo.
 * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Photo->value),
    new FieldCompareChecker('photo_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InlineQueryResultPhoto extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param Url $photo_url A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB
     * @param Url $thumbnail_url URL of the thumbnail for the photo
     * @param string|null $caption Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param string|null $description Optional. Short description of the result
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the photo
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the photo caption. See formatting options
     * for more details.
     * @param int|null $photo_height Optional. Height of the photo
     * @param int|null $photo_width Optional. Width of the photo
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param string|null $title Optional. Title for the result
     * @param bool|null $show_caption_above_media Optional. True, if the caption must be shown above the message media
     */
    public function __construct(
        protected string $id,
        protected Url $photo_url,
        protected Url $thumbnail_url,
        protected string|null $caption = null,
        #[ArrayType(MessageEntity::class)] protected array|null $caption_entities = null,
        protected string|null $description = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected int|null $photo_height = null,
        protected int|null $photo_width = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
        protected string|null $title = null,
        protected bool|null $show_caption_above_media = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Photo);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultPhoto
    {
        $this->id = $id;
        return $this;
    }

    public function getPhotoUrl(): Url
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(Url $photo_url): InlineQueryResultPhoto
    {
        $this->photo_url = $photo_url;
        return $this;
    }

    public function getThumbnailUrl(): Url
    {
        return $this->thumbnail_url;
    }

    public function setThumbnailUrl(Url $thumbnail_url): InlineQueryResultPhoto
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InlineQueryResultPhoto
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultPhoto
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): InlineQueryResultPhoto
    {
        $this->description = $description;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultPhoto
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultPhoto
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getPhotoHeight(): int|null
    {
        return $this->photo_height;
    }

    public function setPhotoHeight(int|null $photo_height): InlineQueryResultPhoto
    {
        $this->photo_height = $photo_height;
        return $this;
    }

    public function getPhotoWidth(): int|null
    {
        return $this->photo_width;
    }

    public function setPhotoWidth(int|null $photo_width): InlineQueryResultPhoto
    {
        $this->photo_width = $photo_width;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultPhoto
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): InlineQueryResultPhoto
    {
        $this->title = $title;
        return $this;
    }

    public function getShowCaptionAboveMedia(): bool|null
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): InlineQueryResultPhoto
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'photo_url' => $this->photo_url->getUrl(),
            'thumbnail_url' => $this->thumbnail_url->getUrl(),
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'description' => $this->description,
            'input_message_content' => $this->input_message_content?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
            'photo_height' => $this->photo_height,
            'photo_width' => $this->photo_width,
            'reply_markup' => $this->reply_markup?->toArray(),
            'title' => $this->title,
            'show_caption_above_media' => $this->show_caption_above_media,
        ];
    }
}
