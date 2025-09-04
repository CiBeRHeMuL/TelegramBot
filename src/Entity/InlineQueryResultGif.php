<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultThumbnailMimeTypeEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional caption.
 * Alternatively, you can use input_message_content to send a message with the specified content instead of the animation.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultgif
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Gif->value),
    new FieldCompareChecker('gif_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultGif extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param Url $gif_url A valid URL for the GIF file
     * @param Url $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     * @param string|null $caption Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param int|null $gif_duration Optional. Duration of the GIF in seconds
     * @param int|null $gif_height Optional. Height of the GIF
     * @param int|null $gif_width Optional. Width of the GIF
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * GIF animation
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the caption. See formatting options for
     * more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param InlineQueryResultThumbnailMimeTypeEnum|null $thumbnail_mime_type Optional. MIME type of the thumbnail, must be one
     * of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
     * @param string|null $title Optional. Title for the result
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
        protected Url $gif_url,
        protected Url $thumbnail_url,
        protected string|null $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $caption_entities = null,
        protected int|null $gif_duration = null,
        protected int|null $gif_height = null,
        protected int|null $gif_width = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
        protected InlineQueryResultThumbnailMimeTypeEnum|null $thumbnail_mime_type = null,
        protected string|null $title = null,
        protected bool|null $show_caption_above_media = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Gif);
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
     * @return InlineQueryResultGif
     */
    public function setId(string $id): InlineQueryResultGif
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Url
     */
    public function getGifUrl(): Url
    {
        return $this->gif_url;
    }

    /**
     * @param Url $gif_url
     *
     * @return InlineQueryResultGif
     */
    public function setGifUrl(Url $gif_url): InlineQueryResultGif
    {
        $this->gif_url = $gif_url;
        return $this;
    }

    /**
     * @return Url
     */
    public function getThumbnailUrl(): Url
    {
        return $this->thumbnail_url;
    }

    /**
     * @param Url $thumbnail_url
     *
     * @return InlineQueryResultGif
     */
    public function setThumbnailUrl(Url $thumbnail_url): InlineQueryResultGif
    {
        $this->thumbnail_url = $thumbnail_url;
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
     * @return InlineQueryResultGif
     */
    public function setCaption(string|null $caption): InlineQueryResultGif
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
     * @return InlineQueryResultGif
     */
    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultGif
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifDuration(): int|null
    {
        return $this->gif_duration;
    }

    /**
     * @param int|null $gif_duration
     *
     * @return InlineQueryResultGif
     */
    public function setGifDuration(int|null $gif_duration): InlineQueryResultGif
    {
        $this->gif_duration = $gif_duration;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifHeight(): int|null
    {
        return $this->gif_height;
    }

    /**
     * @param int|null $gif_height
     *
     * @return InlineQueryResultGif
     */
    public function setGifHeight(int|null $gif_height): InlineQueryResultGif
    {
        $this->gif_height = $gif_height;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifWidth(): int|null
    {
        return $this->gif_width;
    }

    /**
     * @param int|null $gif_width
     *
     * @return InlineQueryResultGif
     */
    public function setGifWidth(int|null $gif_width): InlineQueryResultGif
    {
        $this->gif_width = $gif_width;
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
     * @return InlineQueryResultGif
     */
    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultGif
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
     * @return InlineQueryResultGif
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultGif
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
     * @return InlineQueryResultGif
     */
    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultGif
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return InlineQueryResultThumbnailMimeTypeEnum|null
     */
    public function getThumbnailMimeType(): InlineQueryResultThumbnailMimeTypeEnum|null
    {
        return $this->thumbnail_mime_type;
    }

    /**
     * @param InlineQueryResultThumbnailMimeTypeEnum|null $thumbnail_mime_type
     *
     * @return InlineQueryResultGif
     */
    public function setThumbnailMimeType(InlineQueryResultThumbnailMimeTypeEnum|null $thumbnail_mime_type): InlineQueryResultGif
    {
        $this->thumbnail_mime_type = $thumbnail_mime_type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): string|null
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return InlineQueryResultGif
     */
    public function setTitle(string|null $title): InlineQueryResultGif
    {
        $this->title = $title;
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
     * @return InlineQueryResultGif
     */
    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): InlineQueryResultGif
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }
}
