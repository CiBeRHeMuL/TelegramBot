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

/**
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by the user with an optional
 * caption. Alternatively, you can use input_message_content to send a message with the specified content instead of the file.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Document->value),
    new FieldCompareChecker('document_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultCachedDocument extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $title Title for the result
     * @param string $document_file_id A valid file identifier for the file
     * @param string|null $caption Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param string|null $description Optional. Short description of the result
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * file
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the document caption. See formatting
     * options for more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards Inline keyboard
     * @see https://core.telegram.org/bots/api#inputmessagecontent InputMessageContent
     */
    public function __construct(
        protected string $id,
        protected string $title,
        protected string $document_file_id,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?string $description = null,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
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
     * @return InlineQueryResultCachedDocument
     */
    public function setId(string $id): InlineQueryResultCachedDocument
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
     * @return InlineQueryResultCachedDocument
     */
    public function setTitle(string $title): InlineQueryResultCachedDocument
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentFileId(): string
    {
        return $this->document_file_id;
    }

    /**
     * @param string $document_file_id
     *
     * @return InlineQueryResultCachedDocument
     */
    public function setDocumentFileId(string $document_file_id): InlineQueryResultCachedDocument
    {
        $this->document_file_id = $document_file_id;
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
     * @return InlineQueryResultCachedDocument
     */
    public function setCaption(?string $caption): InlineQueryResultCachedDocument
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
     * @return InlineQueryResultCachedDocument
     */
    public function setCaptionEntities(?array $caption_entities): InlineQueryResultCachedDocument
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
     * @return InlineQueryResultCachedDocument
     */
    public function setDescription(?string $description): InlineQueryResultCachedDocument
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
     * @return InlineQueryResultCachedDocument
     */
    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultCachedDocument
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
     * @return InlineQueryResultCachedDocument
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InlineQueryResultCachedDocument
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
     * @return InlineQueryResultCachedDocument
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultCachedDocument
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }
}
