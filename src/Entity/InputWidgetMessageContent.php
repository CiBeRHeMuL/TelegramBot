<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

// region CLASS_InputWidgetMessageContent
/**
 * Represents the content of a message with an HTML widget to be sent as the result of an inline query. Currently, widgets can't
 * be sent in response to inline queries in the production environment.
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent content
 * @see https://core.telegram.org/bots/widgets HTML widget
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#inputwidgetmessagecontent
 */
#[BuildIf(new FieldCompareChecker('html', null, CompareOperatorEnum::StrictNotEqual))]
final class InputWidgetMessageContent extends AbstractInputMessageContent
{
    /**
     * @param string                     $html                     HTML code of the widget, 1-32768 bytes. The code must not exceed 4096 bytes when compressed by zlib with
     *                                                             the maximum compression level.
     * @param bool|null                  $allow_queries            Optional. Pass True to allow the widget to send queries to the bot
     * @param string|null                $caption                  Optional. Widget caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null       $caption_entities         Optional. List of special entities that appear in the caption, which can be
     *                                                             specified instead of parse_mode
     * @param string|null                $chat_data                Optional. Data of the widget, which is specific to the message, 0-1024 bytes
     * @param int|null                   $height                   Optional. Height of the widget in logical pixels; omit if the height of the widget isn't fixed. The
     *                                                             height is clamped by the app to the range 50-600.
     * @param bool|null                  $is_shared                Optional. Pass True to create a shared widget. Each message sent from the result creates a separate
     *                                                             shared widget, whose identifier is received by the bot only in the field widget_id of queries from the widget. To send an
     *                                                             existing shared widget in response to an inline query, use InputSharedWidgetMessageContent instead.
     * @param TelegramParseModeEnum|null $parse_mode               Optional. Mode for parsing entities in the widget caption. See formatting options
     *                                                             for more details.
     * @param string|null                $public_data              Optional. Public data of the widget, 0-1024 bytes, which will be available wherever the widget
     *                                                             is shown. If the widget is shared, then all messages with it will have the same public data.
     * @param bool|null                  $show_caption_above_media Optional. Pass True if the caption must be shown above the widget
     * @param int|null                   $width                    Optional. Width of the widget in logical pixels; omit if the widget must occupy the whole width of
     *                                                             the message bubble. The width is clamped by the app to the range from 200 to the maximum width of the message bubble.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inputsharedwidgetmessagecontent InputSharedWidgetMessageContent
     */
    public function __construct(
        protected string $html,
        protected ?bool $allow_queries = null,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?string $chat_data = null,
        protected ?int $height = null,
        protected ?bool $is_shared = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?string $public_data = null,
        protected ?bool $show_caption_above_media = null,
        protected ?int $width = null,
    ) {}

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    /**
     * @param string $html
     *
     * @return InputWidgetMessageContent
     */
    public function setHtml(string $html): InputWidgetMessageContent
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowQueries(): ?bool
    {
        return $this->allow_queries;
    }

    /**
     * @param bool|null $allow_queries
     *
     * @return InputWidgetMessageContent
     */
    public function setAllowQueries(?bool $allow_queries): InputWidgetMessageContent
    {
        $this->allow_queries = $allow_queries;

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
     * @return InputWidgetMessageContent
     */
    public function setCaption(?string $caption): InputWidgetMessageContent
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
     * @return InputWidgetMessageContent
     */
    public function setCaptionEntities(?array $caption_entities): InputWidgetMessageContent
    {
        $this->caption_entities = $caption_entities;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChatData(): ?string
    {
        return $this->chat_data;
    }

    /**
     * @param string|null $chat_data
     *
     * @return InputWidgetMessageContent
     */
    public function setChatData(?string $chat_data): InputWidgetMessageContent
    {
        $this->chat_data = $chat_data;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     *
     * @return InputWidgetMessageContent
     */
    public function setHeight(?int $height): InputWidgetMessageContent
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsShared(): ?bool
    {
        return $this->is_shared;
    }

    /**
     * @param bool|null $is_shared
     *
     * @return InputWidgetMessageContent
     */
    public function setIsShared(?bool $is_shared): InputWidgetMessageContent
    {
        $this->is_shared = $is_shared;

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
     * @return InputWidgetMessageContent
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InputWidgetMessageContent
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPublicData(): ?string
    {
        return $this->public_data;
    }

    /**
     * @param string|null $public_data
     *
     * @return InputWidgetMessageContent
     */
    public function setPublicData(?string $public_data): InputWidgetMessageContent
    {
        $this->public_data = $public_data;

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
     * @return InputWidgetMessageContent
     */
    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): InputWidgetMessageContent
    {
        $this->show_caption_above_media = $show_caption_above_media;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     *
     * @return InputWidgetMessageContent
     */
    public function setWidth(?int $width): InputWidgetMessageContent
    {
        $this->width = $width;

        return $this;
    }
}
// endregion CLASS_InputWidgetMessageContent
