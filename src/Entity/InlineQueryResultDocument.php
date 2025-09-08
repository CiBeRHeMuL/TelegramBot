<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultDocumentMimeTypeEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can
 * use input_message_content to send a message with the specified content instead of the file. Currently, only .PDF and .ZIP
 * files can be sent using this method.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultdocument
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Document->value),
    new FieldCompareChecker('document_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultDocument extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $title Title for the result
     * @param Url $document_url A valid URL for the file
     * @param InlineQueryResultDocumentMimeTypeEnum $mime_type MIME type of the content of the file, either “application/pdf”
     * or “application/zip”
     * @param string|null $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param string|null $description Optional. Short description of the result
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * file
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the document caption. See formatting
     * options for more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param int|null $thumbnail_height Optional. Thumbnail height
     * @param Url|null $thumbnail_url Optional. URL of the thumbnail (JPEG only) for the file
     * @param int|null $thumbnail_width Optional. Thumbnail width
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/api#inputmessagecontent InputMessageContent
     */
    public function __construct(
        protected string $id,
        protected string $title,
        protected Url $document_url,
        protected InlineQueryResultDocumentMimeTypeEnum $mime_type,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?string $description = null,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
        protected ?int $thumbnail_height = null,
        protected ?Url $thumbnail_url = null,
        protected ?int $thumbnail_width = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Document);
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
     * @return InlineQueryResultDocument
     */
    public function setId(string $id): InlineQueryResultDocument
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return InlineQueryResultDocument
     */
    public function setTitle(string $title): InlineQueryResultDocument
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Url
     */
    public function getDocumentUrl(): Url
    {
        return $this->document_url;
    }

    /**
     * @param Url $document_url
     *
     * @return InlineQueryResultDocument
     */
    public function setDocumentUrl(Url $document_url): InlineQueryResultDocument
    {
        $this->document_url = $document_url;
        return $this;
    }

    /**
     * @return InlineQueryResultDocumentMimeTypeEnum
     */
    public function getMimeType(): InlineQueryResultDocumentMimeTypeEnum
    {
        return $this->mime_type;
    }

    /**
     * @param InlineQueryResultDocumentMimeTypeEnum $mime_type
     *
     * @return InlineQueryResultDocument
     */
    public function setMimeType(InlineQueryResultDocumentMimeTypeEnum $mime_type): InlineQueryResultDocument
    {
        $this->mime_type = $mime_type;
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
     * @return InlineQueryResultDocument
     */
    public function setCaption(?string $caption): InlineQueryResultDocument
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
     * @return InlineQueryResultDocument
     */
    public function setCaptionEntities(?array $caption_entities): InlineQueryResultDocument
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
     * @return InlineQueryResultDocument
     */
    public function setDescription(?string $description): InlineQueryResultDocument
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
     * @return InlineQueryResultDocument
     */
    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultDocument
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
     * @return InlineQueryResultDocument
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InlineQueryResultDocument
    {
        $this->parse_mode = $parse_mode;
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
     * @return InlineQueryResultDocument
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultDocument
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbnailHeight(): ?int
    {
        return $this->thumbnail_height;
    }

    /**
     * @param int|null $thumbnail_height
     *
     * @return InlineQueryResultDocument
     */
    public function setThumbnailHeight(?int $thumbnail_height): InlineQueryResultDocument
    {
        $this->thumbnail_height = $thumbnail_height;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getThumbnailUrl(): ?Url
    {
        return $this->thumbnail_url;
    }

    /**
     * @param Url|null $thumbnail_url
     *
     * @return InlineQueryResultDocument
     */
    public function setThumbnailUrl(?Url $thumbnail_url): InlineQueryResultDocument
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbnailWidth(): ?int
    {
        return $this->thumbnail_width;
    }

    /**
     * @param int|null $thumbnail_width
     *
     * @return InlineQueryResultDocument
     */
    public function setThumbnailWidth(?int $thumbnail_width): InlineQueryResultDocument
    {
        $this->thumbnail_width = $thumbnail_width;
        return $this;
    }
}
