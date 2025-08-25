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
use stdClass;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file will
 * be sent by the user with optional caption. Alternatively, you can use input_message_content to send a message with the specified
 * content instead of the animation.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Mpeg4Gif->value),
    new FieldCompareChecker('mpeg4_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InlineQueryResultMpeg4Gif extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param Url $mpeg4_url A valid URL for the MPEG4 file
     * @param Url $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     * @param string|null $caption Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * video animation
     * @param int|null $mpeg4_duration Optional. Video duration in seconds
     * @param int|null $mpeg4_height Optional. Video height
     * @param int|null $mpeg4_width Optional. Video width
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
        protected Url $mpeg4_url,
        protected Url $thumbnail_url,
        protected string|null $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $caption_entities = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected int|null $mpeg4_duration = null,
        protected int|null $mpeg4_height = null,
        protected int|null $mpeg4_width = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
        protected InlineQueryResultThumbnailMimeTypeEnum|null $thumbnail_mime_type = null,
        protected string|null $title = null,
        protected bool|null $show_caption_above_media = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Mpeg4Gif);
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setId(string $id): InlineQueryResultMpeg4Gif
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Url
     */
    public function getMpeg4Url(): Url
    {
        return $this->mpeg4_url;
    }

    /**
     * @param Url $mpeg4_url
     *
     * @return InlineQueryResultMpeg4Gif
     */
    public function setMpeg4Url(Url $mpeg4_url): InlineQueryResultMpeg4Gif
    {
        $this->mpeg4_url = $mpeg4_url;
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setThumbnailUrl(Url $thumbnail_url): InlineQueryResultMpeg4Gif
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setCaption(string|null $caption): InlineQueryResultMpeg4Gif
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultMpeg4Gif
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultMpeg4Gif
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Duration(): int|null
    {
        return $this->mpeg4_duration;
    }

    /**
     * @param int|null $mpeg4_duration
     *
     * @return InlineQueryResultMpeg4Gif
     */
    public function setMpeg4Duration(int|null $mpeg4_duration): InlineQueryResultMpeg4Gif
    {
        $this->mpeg4_duration = $mpeg4_duration;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Height(): int|null
    {
        return $this->mpeg4_height;
    }

    /**
     * @param int|null $mpeg4_height
     *
     * @return InlineQueryResultMpeg4Gif
     */
    public function setMpeg4Height(int|null $mpeg4_height): InlineQueryResultMpeg4Gif
    {
        $this->mpeg4_height = $mpeg4_height;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Width(): int|null
    {
        return $this->mpeg4_width;
    }

    /**
     * @param int|null $mpeg4_width
     *
     * @return InlineQueryResultMpeg4Gif
     */
    public function setMpeg4Width(int|null $mpeg4_width): InlineQueryResultMpeg4Gif
    {
        $this->mpeg4_width = $mpeg4_width;
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultMpeg4Gif
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultMpeg4Gif
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setThumbnailMimeType(InlineQueryResultThumbnailMimeTypeEnum|null $thumbnail_mime_type): InlineQueryResultMpeg4Gif
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setTitle(string|null $title): InlineQueryResultMpeg4Gif
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
     * @return InlineQueryResultMpeg4Gif
     */
    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): InlineQueryResultMpeg4Gif
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'mpeg4_url' => $this->mpeg4_url->getUrl(),
            'thumbnail_url' => $this->thumbnail_url->getUrl(),
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->caption_entities,
                )
                : null,
            'input_message_content' => $this->input_message_content?->toArray(),
            'mpeg4_duration' => $this->mpeg4_duration,
            'mpeg4_height' => $this->mpeg4_height,
            'mpeg4_width' => $this->mpeg4_width,
            'parse_mode' => $this->parse_mode?->value,
            'reply_markup' => $this->reply_markup?->toArray(),
            'thumbnail_mime_type' => $this->thumbnail_mime_type?->value,
            'title' => $this->title,
            'show_caption_above_media' => $this->show_caption_above_media,
            'type' => $this->type->value,
        ];
    }
}
