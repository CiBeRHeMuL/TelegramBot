<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\AndChecker;
use AndrewGos\TelegramBot\EntityChecker\FieldCompareChecker;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram servers. By default,
 * this animated MPEG-4 file will be sent by the user with an optional caption. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the animation.
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Mpeg4Gif->value),
    new FieldCompareChecker('mpeg4_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InlineQueryResultCachedMpeg4Gif extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $mpeg4_file_id A valid file identifier for the MPEG4 file
     * @param string|null $caption Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * video animation
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for
     * more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param string|null $title Optional. Title for the result
     */
    public function __construct(
        private string $id,
        private string $mpeg4_file_id,
        private string|null $caption = null,
        #[ArrayType(MessageEntity::class)] private array|null $caption_entities = null,
        private AbstractInputMessageContent|null $input_message_content = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private string|null $title = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Mpeg4Gif);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultCachedMpeg4Gif
    {
        $this->id = $id;
        return $this;
    }

    public function getMpeg4FileId(): string
    {
        return $this->mpeg4_file_id;
    }

    public function setMpeg4FileId(string $mpeg4_file_id): InlineQueryResultCachedMpeg4Gif
    {
        $this->mpeg4_file_id = $mpeg4_file_id;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InlineQueryResultCachedMpeg4Gif
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultCachedMpeg4Gif
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultCachedMpeg4Gif
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultCachedMpeg4Gif
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultCachedMpeg4Gif
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): InlineQueryResultCachedMpeg4Gif
    {
        $this->title = $title;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'mpeg4_file_id' => $this->mpeg4_file_id,
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'input_message_content' => $this->input_message_content?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
            'reply_markup' => $this->reply_markup?->toArray(),
            'title' => $this->title,
        ];
    }
}
