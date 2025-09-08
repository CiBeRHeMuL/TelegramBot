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
 * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this voice recording will be sent
 * by the user. Alternatively, you can use input_message_content to send a message with the specified content instead of the
 * the voice message.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultvoice
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Voice->value),
    new FieldCompareChecker('voice_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultVoice extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param Url $voice_url A valid URL for the voice recording
     * @param string $title Recording title
     * @param string|null $caption Optional. Caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * voice recording
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the voice message caption. See formatting
     * options for more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param int|null $voice_duration Optional. Recording duration in seconds
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards Inline keyboard
     * @see https://core.telegram.org/bots/api#inputmessagecontent InputMessageContent
     */
    public function __construct(
        protected string $id,
        protected Url $voice_url,
        protected string $title,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
        protected ?int $voice_duration = null,
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
     * @return InlineQueryResultVoice
     */
    public function setId(string $id): InlineQueryResultVoice
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Url
     */
    public function getVoiceUrl(): Url
    {
        return $this->voice_url;
    }

    /**
     * @param Url $voice_url
     *
     * @return InlineQueryResultVoice
     */
    public function setVoiceUrl(Url $voice_url): InlineQueryResultVoice
    {
        $this->voice_url = $voice_url;
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
     * @return InlineQueryResultVoice
     */
    public function setTitle(string $title): InlineQueryResultVoice
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
     * @return InlineQueryResultVoice
     */
    public function setCaption(?string $caption): InlineQueryResultVoice
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
     * @return InlineQueryResultVoice
     */
    public function setCaptionEntities(?array $caption_entities): InlineQueryResultVoice
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
     * @return InlineQueryResultVoice
     */
    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultVoice
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
     * @return InlineQueryResultVoice
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InlineQueryResultVoice
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
     * @return InlineQueryResultVoice
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultVoice
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVoiceDuration(): ?int
    {
        return $this->voice_duration;
    }

    /**
     * @param int|null $voice_duration
     *
     * @return InlineQueryResultVoice
     */
    public function setVoiceDuration(?int $voice_duration): InlineQueryResultVoice
    {
        $this->voice_duration = $voice_duration;
        return $this;
    }
}
