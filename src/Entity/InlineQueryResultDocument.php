<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\AndChecker;
use AndrewGos\TelegramBot\EntityChecker\FieldCompareChecker;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultDocumentMimeTypeEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption. Alternatively, you can
 * use input_message_content to send a message with the specified content instead of the file. Currently, only .PDF and .ZIP
 * files can be sent using this method.
 * @link https://core.telegram.org/bots/api#inlinequeryresultdocument
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Document->value),
    new FieldCompareChecker('document_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InlineQueryResultDocument extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $title Title for the result
     * @param Url $document_url A valid URL for the file
     * @param InlineQueryResultDocumentMimeTypeEnum $mime_type MIME type of the content of the file, either “application/pdf” or “application/zip”
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
     */
    public function __construct(
        private string $id,
        private string $title,
        private Url $document_url,
        private InlineQueryResultDocumentMimeTypeEnum $mime_type,
        private string|null $caption = null,
        #[ArrayType(MessageEntity::class)] private array|null $caption_entities = null,
        private string|null $description = null,
        private AbstractInputMessageContent|null $input_message_content = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private int|null $thumbnail_height = null,
        private Url|null $thumbnail_url = null,
        private int|null $thumbnail_width = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Document);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultDocument
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): InlineQueryResultDocument
    {
        $this->title = $title;
        return $this;
    }

    public function getDocumentUrl(): Url
    {
        return $this->document_url;
    }

    public function setDocumentUrl(Url $document_url): InlineQueryResultDocument
    {
        $this->document_url = $document_url;
        return $this;
    }

    public function getMimeType(): InlineQueryResultDocumentMimeTypeEnum
    {
        return $this->mime_type;
    }

    public function setMimeType(InlineQueryResultDocumentMimeTypeEnum $mime_type): InlineQueryResultDocument
    {
        $this->mime_type = $mime_type;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InlineQueryResultDocument
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultDocument
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): InlineQueryResultDocument
    {
        $this->description = $description;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultDocument
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultDocument
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultDocument
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getThumbnailHeight(): int|null
    {
        return $this->thumbnail_height;
    }

    public function setThumbnailHeight(int|null $thumbnail_height): InlineQueryResultDocument
    {
        $this->thumbnail_height = $thumbnail_height;
        return $this;
    }

    public function getThumbnailUrl(): Url|null
    {
        return $this->thumbnail_url;
    }

    public function setThumbnailUrl(Url|null $thumbnail_url): InlineQueryResultDocument
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    public function getThumbnailWidth(): int|null
    {
        return $this->thumbnail_width;
    }

    public function setThumbnailWidth(int|null $thumbnail_width): InlineQueryResultDocument
    {
        $this->thumbnail_width = $thumbnail_width;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'title' => $this->title,
            'document_url' => $this->document_url->getUrl(),
            'mime_type' => $this->mime_type->value,
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'description' => $this->description,
            'input_message_content' => $this->input_message_content?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
            'reply_markup' => $this->reply_markup?->toArray(),
            'thumbnail_height' => $this->thumbnail_height,
            'thumbnail_url' => $this->thumbnail_url?->getUrl(),
            'thumbnail_width' => $this->thumbnail_width,
        ];
    }
}
