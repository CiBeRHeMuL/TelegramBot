<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\AndChecker;
use AndrewGos\TelegramBot\EntityChecker\FieldCompareChecker;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\CompareOperatorEnum;
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
class InlineQueryResultVideo extends AbstractInlineQueryResult
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
     */
    public function __construct(
        private string $id,
        private Url $video_url,
        private InlineQueryResultVideoMimeTypeEnum $mime_type,
        private Url $thumbnail_url,
        private string $title,
        private string|null $caption = null,
        #[ArrayType(MessageEntity::class)] private array|null $caption_entities = null,
        private string|null $description = null,
        private AbstractInputMessageContent|null $input_message_content = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private int|null $video_duration = null,
        private int|null $video_height = null,
        private int|null $video_width = null,
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

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): InlineQueryResultVideo
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultVideo
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): InlineQueryResultVideo
    {
        $this->description = $description;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultVideo
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultVideo
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultVideo
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getVideoDuration(): int|null
    {
        return $this->video_duration;
    }

    public function setVideoDuration(int|null $video_duration): InlineQueryResultVideo
    {
        $this->video_duration = $video_duration;
        return $this;
    }

    public function getVideoHeight(): int|null
    {
        return $this->video_height;
    }

    public function setVideoHeight(int|null $video_height): InlineQueryResultVideo
    {
        $this->video_height = $video_height;
        return $this;
    }

    public function getVideoWidth(): int|null
    {
        return $this->video_width;
    }

    public function setVideoWidth(int|null $video_width): InlineQueryResultVideo
    {
        $this->video_width = $video_width;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'video_url' => $this->video_url->getUrl(),
            'mime_type' => $this->mime_type->value,
            'thumbnail_url' => $this->thumbnail_url->getUrl(),
            'title' => $this->title,
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'description' => $this->description,
            'input_message_content' => $this->input_message_content?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
            'reply_markup' => $this->reply_markup?->toArray(),
            'video_duration' => $this->video_duration,
            'video_height' => $this->video_height,
            'video_width' => $this->video_width,
        ];
    }
}
