<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\Enum\InlineQueryResultVideoMimeTypeEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent
 * by the user with an optional caption. Alternatively, you can use input_message_content to send a message with the specified
 * content instead of the video.
 *
 * If an InlineQueryResultVideo message contains an embedded video (e.g., YouTube), you must replace its content using input_message_content.
 * @link https://core.telegram.org/bots/api#inlinequeryresultvideo
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Video->value),
    new FieldCompareChecker('video_url', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultVideo extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param Url $video_url A valid URL for the embedded video player or video file
     * @param InlineQueryResultVideoMimeTypeEnum $mime_type MIME type of the content of the video URL, “text/html” or “video/mp4”
     * @param Url $thumbnail_url URL of the thumbnail (JPEG only) for the video
     * @param string $title Title for the result
     * @param string|null $caption Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param string|null $description Optional. Short description of the result
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * video. This field is required if InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the video caption. See formatting options
     * for more details.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param int|null $video_duration Optional. Video duration in seconds
     * @param int|null $video_height Optional. Video height
     * @param int|null $video_width Optional. Video width
     * @param bool|null $show_caption_above_media Optional. True, if the caption must be shown above the message media
     */
    public function __construct(
        protected string $id,
        protected Url $video_url,
        protected InlineQueryResultVideoMimeTypeEnum $mime_type,
        protected Url $thumbnail_url,
        protected string $title,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?string $description = null,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
        protected ?int $video_duration = null,
        protected ?int $video_height = null,
        protected ?int $video_width = null,
        protected ?bool $show_caption_above_media = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Video);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultVideo
    {
        $this->id = $id;
        return $this;
    }

    public function getVideoUrl(): Url
    {
        return $this->video_url;
    }

    public function setVideoUrl(Url $video_url): InlineQueryResultVideo
    {
        $this->video_url = $video_url;
        return $this;
    }

    public function getMimeType(): InlineQueryResultVideoMimeTypeEnum
    {
        return $this->mime_type;
    }

    public function setMimeType(InlineQueryResultVideoMimeTypeEnum $mime_type): InlineQueryResultVideo
    {
        $this->mime_type = $mime_type;
        return $this;
    }

    public function getThumbnailUrl(): Url
    {
        return $this->thumbnail_url;
    }

    public function setThumbnailUrl(Url $thumbnail_url): InlineQueryResultVideo
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): InlineQueryResultVideo
    {
        $this->title = $title;
        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): InlineQueryResultVideo
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): InlineQueryResultVideo
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): InlineQueryResultVideo
    {
        $this->description = $description;
        return $this;
    }

    public function getInputMessageContent(): ?AbstractInputMessageContent
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultVideo
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): InlineQueryResultVideo
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultVideo
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getVideoDuration(): ?int
    {
        return $this->video_duration;
    }

    public function setVideoDuration(?int $video_duration): InlineQueryResultVideo
    {
        $this->video_duration = $video_duration;
        return $this;
    }

    public function getVideoHeight(): ?int
    {
        return $this->video_height;
    }

    public function setVideoHeight(?int $video_height): InlineQueryResultVideo
    {
        $this->video_height = $video_height;
        return $this;
    }

    public function getVideoWidth(): ?int
    {
        return $this->video_width;
    }

    public function setVideoWidth(?int $video_width): InlineQueryResultVideo
    {
        $this->video_width = $video_width;
        return $this;
    }

    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): InlineQueryResultVideo
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }
}
