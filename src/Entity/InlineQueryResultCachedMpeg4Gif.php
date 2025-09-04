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
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram servers. By default,
 * this animated MPEG-4 file will be sent by the user with an optional caption. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the animation.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 */
#[BuildIf(new AndChecker([
    new FieldIsChecker('type', InlineQueryResultTypeEnum::Mpeg4Gif->value),
    new FieldCompareChecker('mpeg4_file_id', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InlineQueryResultCachedMpeg4Gif extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $mpeg4_file_id A valid file identifier for the MPEG4 file
     * @param string|null $caption Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be
     * specified instead of parse_mode
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * video animation
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
        protected string $mpeg4_file_id,
        protected string|null $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $caption_entities = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
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
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setId(string $id): InlineQueryResultCachedMpeg4Gif
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMpeg4FileId(): string
    {
        return $this->mpeg4_file_id;
    }

    /**
     * @param string $mpeg4_file_id
     *
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setMpeg4FileId(string $mpeg4_file_id): InlineQueryResultCachedMpeg4Gif
    {
        $this->mpeg4_file_id = $mpeg4_file_id;
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
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setCaption(string|null $caption): InlineQueryResultCachedMpeg4Gif
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
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setCaptionEntities(array|null $caption_entities): InlineQueryResultCachedMpeg4Gif
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
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultCachedMpeg4Gif
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
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InlineQueryResultCachedMpeg4Gif
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
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultCachedMpeg4Gif
    {
        $this->reply_markup = $reply_markup;
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
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setTitle(string|null $title): InlineQueryResultCachedMpeg4Gif
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
     * @return InlineQueryResultCachedMpeg4Gif
     */
    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): InlineQueryResultCachedMpeg4Gif
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }
}
