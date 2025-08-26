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
        protected int|null $audio_duration = null,
        protected string|null $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $caption_entities = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected string|null $performer = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
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
    public function getAudioDuration(): int|null
    {
        return $this->audio_duration;
    }

    /**
     * @param int|null $audio_duration
     *
     * @return InlineQueryResultAudio
     */
    public function setAudioDuration(int|null $audio_duration): InlineQueryResultAudio
    {
        $this->audio_duration = $audio_duration;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): string|null
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     *
     * @return InlineQueryResultAudio
     */
    public function setCaption(string|null $caption): InlineQueryResultAudio
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    /**
     * @param MessageEntity[]|null $caption_entities
     *
     * @return InlineQueryResultAudio
     */
    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultAudio
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return AbstractInputMessageContent|null
     */
    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    /**
     * @param AbstractInputMessageContent|null $input_message_content
     *
     * @return InlineQueryResultAudio
     */
    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultAudio
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $parse_mode
     *
     * @return InlineQueryResultAudio
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultAudio
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): string|null
    {
        return $this->performer;
    }

    /**
     * @param string|null $performer
     *
     * @return InlineQueryResultAudio
     */
    public function setPerformer(string|null $performer): InlineQueryResultAudio
    {
        $this->performer = $performer;
        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return InlineQueryResultAudio
     */
    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultAudio
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'audio_url' => $this->audio_url->getUrl(),
            'title' => $this->title,
            'audio_duration' => $this->audio_duration,
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->caption_entities,
                )
                : null,
            'input_message_content' => $this->input_message_content?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
            'performer' => $this->performer,
            'reply_markup' => $this->reply_markup?->toArray(),
            'type' => $this->type->value,
        ];
    }
}
