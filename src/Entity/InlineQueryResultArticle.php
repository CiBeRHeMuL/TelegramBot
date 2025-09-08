<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a link to an article or web page.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
 */
#[BuildIf(new FieldIsChecker('type', InlineQueryResultTypeEnum::Article->value))]
final class InlineQueryResultArticle extends AbstractInlineQueryResult
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
     *
     * @see https://core.telegram.org/bots/api#inputmessagecontent InputMessageContent
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards Inline keyboard
     */
    public function __construct(
        protected string $id,
        protected string $title,
        protected AbstractInputMessageContent $input_message_content,
        protected ?string $description = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
        protected ?int $thumbnail_height = null,
        protected ?Url $thumbnail_url = null,
        protected ?int $thumbnail_width = null,
        protected ?Url $url = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Article);
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
     * @return InlineQueryResultArticle
     */
    public function setId(string $id): InlineQueryResultArticle
    {
        $this->id = $id;
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
     * @return InlineQueryResultArticle
     */
    public function setTitle(string $title): InlineQueryResultArticle
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return AbstractInputMessageContent
     */
    public function getInputMessageContent(): AbstractInputMessageContent
    {
        return $this->input_message_content;
    }

    /**
     * @param AbstractInputMessageContent $input_message_content
     *
     * @return InlineQueryResultArticle
     */
    public function setInputMessageContent(AbstractInputMessageContent $input_message_content): InlineQueryResultArticle
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return InlineQueryResultArticle
     */
    public function setDescription(?string $description): InlineQueryResultArticle
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return InlineQueryResultArticle
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultArticle
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbnailHeight(): ?int
    {
        return $this->thumbnail_height;
    }

    /**
     * @param int|null $thumbnail_height
     *
     * @return InlineQueryResultArticle
     */
    public function setThumbnailHeight(?int $thumbnail_height): InlineQueryResultArticle
    {
        $this->thumbnail_height = $thumbnail_height;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getThumbnailUrl(): ?Url
    {
        return $this->thumbnail_url;
    }

    /**
     * @param Url|null $thumbnail_url
     *
     * @return InlineQueryResultArticle
     */
    public function setThumbnailUrl(?Url $thumbnail_url): InlineQueryResultArticle
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbnailWidth(): ?int
    {
        return $this->thumbnail_width;
    }

    /**
     * @param int|null $thumbnail_width
     *
     * @return InlineQueryResultArticle
     */
    public function setThumbnailWidth(?int $thumbnail_width): InlineQueryResultArticle
    {
        $this->thumbnail_width = $thumbnail_width;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getUrl(): ?Url
    {
        return $this->url;
    }

    /**
     * @param Url|null $url
     *
     * @return InlineQueryResultArticle
     */
    public function setUrl(?Url $url): InlineQueryResultArticle
    {
        $this->url = $url;
        return $this;
    }
}
