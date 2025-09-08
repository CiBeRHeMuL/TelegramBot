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
 * Represents a link to an MP3 audio file. By default, this audio file will be sent by the user. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the audio.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultaudio
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Audio->value),
    new FieldCompareChecker('audio_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultAudio extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param Url $audio_url A valid URL for the audio file
     * @param string $title Title
     * @param int|null $audio_duration Optional. Audio duration in seconds
     * @param string|null $caption Optional. Caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * audio
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the audio caption. See formatting options
     * for more details.
     * @param string|null $performer Optional. Performer
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
        protected Url $audio_url,
        protected string $title,
        protected ?int $audio_duration = null,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?string $performer = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Audio);
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
     * @return InlineQueryResultAudio
     */
    public function setId(string $id): InlineQueryResultAudio
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Url
     */
    public function getAudioUrl(): Url
    {
        return $this->audio_url;
    }

    /**
     * @param Url $audio_url
     *
     * @return InlineQueryResultAudio
     */
    public function setAudioUrl(Url $audio_url): InlineQueryResultAudio
    {
        $this->audio_url = $audio_url;
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
     * @return InlineQueryResultAudio
     */
    public function setTitle(string $title): InlineQueryResultAudio
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAudioDuration(): ?int
    {
        return $this->audio_duration;
    }

    /**
     * @param int|null $audio_duration
     *
     * @return InlineQueryResultAudio
     */
    public function setAudioDuration(?int $audio_duration): InlineQueryResultAudio
    {
        $this->audio_duration = $audio_duration;
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
     * @return InlineQueryResultAudio
     */
    public function setCaption(?string $caption): InlineQueryResultAudio
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
     * @return InlineQueryResultAudio
     */
    public function setCaptionEntities(?array $caption_entities): InlineQueryResultAudio
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
     * @return InlineQueryResultAudio
     */
    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultAudio
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
     * @return InlineQueryResultAudio
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InlineQueryResultAudio
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     *
     * @return InlineQueryResultAudio
     */
    public function setPerformer(?string $performer): InlineQueryResultAudio
    {
        $this->performer = $performer;
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
     * @return InlineQueryResultAudio
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultAudio
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }
}
