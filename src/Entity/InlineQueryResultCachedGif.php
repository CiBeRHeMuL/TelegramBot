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
 * Represents a link to an animated GIF file stored on the Telegram servers. By default, this animated GIF file will be sent
 * by the user with an optional caption. Alternatively, you can use input_message_content to send a message with specified content
 * instead of the animation.
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Gif->value),
    new FieldCompareChecker('gif_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InlineQueryResultCachedGif extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $gif_file_id A valid file identifier for the GIF file
     * @param string|null $caption Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * GIF animation
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for
     * more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param string|null $title Optional. Title for the result
     */
    public function __construct(
        private string $id,
        private string $gif_file_id,
        private string|null $caption = null,
        #[ArrayType(MessageEntity::class)] private array|null $caption_entities = null,
        private AbstractInputMessageContent|null $input_message_content = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private string|null $title = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Gif);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultCachedGif
    {
        $this->id = $id;
        return $this;
    }

    public function getGifFileId(): string
    {
        return $this->gif_file_id;
    }

    public function setGifFileId(string $gif_file_id): InlineQueryResultCachedGif
    {
        $this->gif_file_id = $gif_file_id;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InlineQueryResultCachedGif
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultCachedGif
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultCachedGif
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultCachedGif
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultCachedGif
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): InlineQueryResultCachedGif
    {
        $this->title = $title;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'gif_file_id' => $this->gif_file_id,
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
