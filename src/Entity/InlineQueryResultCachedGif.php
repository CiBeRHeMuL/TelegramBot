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
 * Represents a link to an animated GIF file stored on the Telegram servers. By default, this animated GIF file will be sent
 * by the user with an optional caption. Alternatively, you can use input_message_content to send a message with specified content
 * instead of the animation.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Gif->value),
    new FieldCompareChecker('gif_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultCachedGif extends AbstractInlineQueryResult
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
        protected string $gif_file_id,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?AbstractInputMessageContent $input_message_content = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?InlineKeyboardMarkup $reply_markup = null,
        protected ?string $title = null,
        protected ?bool $show_caption_above_media = null,
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
     * @return InlineQueryResultCachedGif
     */
    public function setId(string $id): InlineQueryResultCachedGif
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGifFileId(): string
    {
        return $this->gif_file_id;
    }

    /**
     * @param string $gif_file_id
     *
     * @return InlineQueryResultCachedGif
     */
    public function setGifFileId(string $gif_file_id): InlineQueryResultCachedGif
    {
        $this->gif_file_id = $gif_file_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string|null $caption
     *
     * @return InlineQueryResultCachedGif
     */
    public function setCaption(?string $caption): InlineQueryResultCachedGif
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    /**
     * @param MessageEntity[]|null $caption_entities
     *
     * @return InlineQueryResultCachedGif
     */
    public function setCaptionEntities(?array $caption_entities): InlineQueryResultCachedGif
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    /**
     * @return AbstractInputMessageContent|null
     */
    public function getInputMessageContent(): ?AbstractInputMessageContent
    {
        return $this->input_message_content;
    }

    /**
     * @param AbstractInputMessageContent|null $input_message_content
     *
     * @return InlineQueryResultCachedGif
     */
    public function setInputMessageContent(?AbstractInputMessageContent $input_message_content): InlineQueryResultCachedGif
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $parse_mode
     *
     * @return InlineQueryResultCachedGif
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InlineQueryResultCachedGif
    {
        $this->parse_mode = $parse_mode;
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
     * @return InlineQueryResultCachedGif
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultCachedGif
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return InlineQueryResultCachedGif
     */
    public function setTitle(?string $title): InlineQueryResultCachedGif
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    /**
     * @param bool|null $show_caption_above_media
     *
     * @return InlineQueryResultCachedGif
     */
    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): InlineQueryResultCachedGif
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }
}
