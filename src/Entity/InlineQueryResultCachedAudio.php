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
use stdClass;

/**
 * Represents a link to an MP3 audio file stored on the Telegram servers. By default, this audio file will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with the specified content instead of the audio.
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedaudio
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Audio->value),
    new FieldCompareChecker('audio_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InlineQueryResultCachedAudio extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $audio_file_id A valid file identifier for the audio file
     * @param string|null $caption Optional. Caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * audio
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the audio caption. See formatting options
     * for more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     */
    public function __construct(
        protected string $id,
        protected string $audio_file_id,
        protected string|null $caption = null,
        #[ArrayType(MessageEntity::class)] protected array|null $caption_entities = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Audio);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultCachedAudio
    {
        $this->id = $id;
        return $this;
    }

    public function getAudioFileId(): string
    {
        return $this->audio_file_id;
    }

    public function setAudioFileId(string $audio_file_id): InlineQueryResultCachedAudio
    {
        $this->audio_file_id = $audio_file_id;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InlineQueryResultCachedAudio
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultCachedAudio
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultCachedAudio
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultCachedAudio
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultCachedAudio
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'audio_file_id' => $this->audio_file_id,
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'input_message_content' => $this->input_message_content?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
            'reply_markup' => $this->reply_markup?->toArray(),
        ];
    }
}
