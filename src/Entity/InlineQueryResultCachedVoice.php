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
 * Represents a link to a voice message stored on the Telegram servers. By default, this voice message will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with the specified content instead of the voice message.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedvoice
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Voice->value),
    new FieldCompareChecker('voice_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultCachedVoice extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $voice_file_id A valid file identifier for the voice message
     * @param string $title Voice message title
     * @param string|null $caption Optional. Caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * voice message
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the voice message caption. See formatting
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
        protected string $voice_file_id,
        protected string $title,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Voice);
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
     * @return InlineQueryResultCachedVoice
     */
    public function setId(string $id): InlineQueryResultCachedVoice
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getVoiceFileId(): string
    {
        return $this->voice_file_id;
    }

    /**
     * @param string $voice_file_id
     *
     * @return InlineQueryResultCachedVoice
     */
    public function setVoiceFileId(string $voice_file_id): InlineQueryResultCachedVoice
    {
        $this->voice_file_id = $voice_file_id;
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
     * @return InlineQueryResultCachedVoice
     */
    public function setTitle(string $title): InlineQueryResultCachedVoice
    {
        $this->title = $title;
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
     * @return InlineQueryResultCachedVoice
     */
    public function setCaption(?string $caption): InlineQueryResultCachedVoice
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
     * @return InlineQueryResultCachedVoice
     */
    public function setCaptionEntities(?array $caption_entities): InlineQueryResultCachedVoice
    {
        $this->caption_entities = $caption_entities;
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
     * @return InlineQueryResultCachedVoice
     */
    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultCachedVoice
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
     * @return InlineQueryResultCachedVoice
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InlineQueryResultCachedVoice
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
     * @return InlineQueryResultCachedVoice
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultCachedVoice
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }
}
