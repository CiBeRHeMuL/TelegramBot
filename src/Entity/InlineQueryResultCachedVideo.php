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
 * Represents a link to a video file stored on the Telegram servers. By default, this video file will be sent by the user with
 * an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead
 * of the video.
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedvideo
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Video->value),
    new FieldCompareChecker('video_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InlineQueryResultCachedVideo extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $video_file_id A valid file identifier for the video file
     * @param string $title Title for the result
     * @param string|null $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param string|null $description Optional. Short description of the result
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * video
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options
     * for more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param bool|null $show_caption_above_media Optional. True, if the caption must be shown above the message media
     */
    public function __construct(
        protected string $id,
        protected string $video_file_id,
        protected string $title,
        protected string|null $caption = null,
        #[ArrayType(MessageEntity::class)] protected array|null $caption_entities = null,
        protected string|null $description = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
        protected bool|null $show_caption_above_media = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Video);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultCachedVideo
    {
        $this->id = $id;
        return $this;
    }

    public function getVideoFileId(): string
    {
        return $this->video_file_id;
    }

    public function setVideoFileId(string $video_file_id): InlineQueryResultCachedVideo
    {
        $this->video_file_id = $video_file_id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): InlineQueryResultCachedVideo
    {
        $this->title = $title;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InlineQueryResultCachedVideo
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultCachedVideo
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): InlineQueryResultCachedVideo
    {
        $this->description = $description;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultCachedVideo
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultCachedVideo
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultCachedVideo
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getShowCaptionAboveMedia(): bool|null
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): InlineQueryResultCachedVideo
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'video_file_id' => $this->video_file_id,
            'title' => $this->title,
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities) : null,
            'description' => $this->description,
            'input_message_content' => $this->input_message_content?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
            'reply_markup' => $this->reply_markup?->toArray(),
            'show_caption_above_media' => $this->show_caption_above_media,
        ];
    }
}
