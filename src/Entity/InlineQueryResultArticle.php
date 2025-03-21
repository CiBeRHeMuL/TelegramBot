<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Represents a link to an article or web page.
 * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
 */
#[BuildIf(new FieldIsChecker('type', InlineQueryResultTypeEnum::Article->value))]
class InlineQueryResultArticle extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param string $title Title of the result
     * @param AbstractInputMessageContent $input_message_content Content of the message to be sent
     * @param string|null $description Optional. Short description of the result
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param int|null $thumbnail_height Optional. Thumbnail height
     * @param Url|null $thumbnail_url Optional. Url of the thumbnail for the result
     * @param int|null $thumbnail_width Optional. Thumbnail width
     * @param Url|null $url Optional. URL of the result
     */
    public function __construct(
        protected string $id,
        protected string $title,
        protected AbstractInputMessageContent $input_message_content,
        protected string|null $description = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
        protected int|null $thumbnail_height = null,
        protected Url|null $thumbnail_url = null,
        protected int|null $thumbnail_width = null,
        protected Url|null $url = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Article);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultArticle
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): InlineQueryResultArticle
    {
        $this->title = $title;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent $input_message_content): InlineQueryResultArticle
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): InlineQueryResultArticle
    {
        $this->description = $description;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultArticle
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getThumbnailHeight(): int|null
    {
        return $this->thumbnail_height;
    }

    public function setThumbnailHeight(int|null $thumbnail_height): InlineQueryResultArticle
    {
        $this->thumbnail_height = $thumbnail_height;
        return $this;
    }

    public function getThumbnailUrl(): Url|null
    {
        return $this->thumbnail_url;
    }

    public function setThumbnailUrl(Url|null $thumbnail_url): InlineQueryResultArticle
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    public function getThumbnailWidth(): int|null
    {
        return $this->thumbnail_width;
    }

    public function setThumbnailWidth(int|null $thumbnail_width): InlineQueryResultArticle
    {
        $this->thumbnail_width = $thumbnail_width;
        return $this;
    }

    public function getUrl(): Url|null
    {
        return $this->url;
    }

    public function setUrl(Url|null $url): InlineQueryResultArticle
    {
        $this->url = $url;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'title' => $this->title,
            'input_message_content' => $this->input_message_content->toArray(),
            'description' => $this->description,
            'reply_markup' => $this->reply_markup?->toArray(),
            'thumbnail_height' => $this->thumbnail_height,
            'thumbnail_url' => $this->thumbnail_url?->getUrl(),
            'thumbnail_width' => $this->thumbnail_width,
            'url' => $this->url?->getUrl(),
        ];
    }
}
