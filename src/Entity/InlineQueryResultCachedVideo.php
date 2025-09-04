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
 * Represents a link to a video file stored on the Telegram servers. By default, this video file will be sent by the user with
 * an optional caption. Alternatively, you can use input_message_content to send a message with the specified content instead
 * of the video.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedvideo
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Video->value),
    new FieldCompareChecker('video_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultCachedVideo extends AbstractInlineQueryResult
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
     * @param bool|null $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards Inline keyboard
     * @see https://core.telegram.org/bots/api#inputmessagecontent InputMessageContent
     */
    public function __construct(
        protected string $id,
        protected string $video_file_id,
        protected string $title,
        protected string|null $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $caption_entities = null,
        protected string|null $description = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
        protected bool|null $show_caption_above_media = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Video);
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
     * @return InlineQueryResultCachedVideo
     */
    public function setId(string $id): InlineQueryResultCachedVideo
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideoFileId(): string
    {
        return $this->video_file_id;
    }

    /**
     * @param string $video_file_id
     *
     * @return InlineQueryResultCachedVideo
     */
    public function setVideoFileId(string $video_file_id): InlineQueryResultCachedVideo
    {
        $this->video_file_id = $video_file_id;
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
     * @return InlineQueryResultCachedVideo
     */
    public function setTitle(string $title): InlineQueryResultCachedVideo
    {
        $this->title = $title;
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
     * @return InlineQueryResultCachedVideo
     */
    public function setCaption(string|null $caption): InlineQueryResultCachedVideo
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
     * @return InlineQueryResultCachedVideo
     */
    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultCachedVideo
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): string|null
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return InlineQueryResultCachedVideo
     */
    public function setDescription(string|null $description): InlineQueryResultCachedVideo
    {
        $this->description = $description;
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
     * @return InlineQueryResultCachedVideo
     */
    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultCachedVideo
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
     * @return InlineQueryResultCachedVideo
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultCachedVideo
    {
        $this->parse_mode = $parse_mode;
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
     * @return InlineQueryResultCachedVideo
     */
    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultCachedVideo
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): bool|null
    {
        return $this->show_caption_above_media;
    }

    /**
     * @param bool|null $show_caption_above_media
     *
     * @return InlineQueryResultCachedVideo
     */
    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): InlineQueryResultCachedVideo
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }
}
