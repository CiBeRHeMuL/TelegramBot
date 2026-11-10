<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

// region CLASS_InputSharedWidgetMessageContent
/**
 * Represents the content of a message with a shared widget to be sent as the result of an inline query. Currently, widgets can't
 * be sent in response to inline queries in the production environment.
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent content
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#inputsharedwidgetmessagecontent
 */
#[BuildIf(new FieldCompareChecker('widget_id', null, CompareOperatorEnum::StrictNotEqual))]
final class InputSharedWidgetMessageContent extends AbstractInputMessageContent
{
    /**
     * @param string                     $widget_id                Unique identifier of the shared widget created by the bot
     * @param string|null                $caption                  Optional. Widget caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null       $caption_entities         Optional. List of special entities that appear in the caption, which can be
     *                                                             specified instead of parse_mode
     * @param string|null                $chat_data                Optional. Data of the widget, which is specific to the message, 0-1024 bytes
     * @param TelegramParseModeEnum|null $parse_mode               Optional. Mode for parsing entities in the widget caption. See formatting options
     *                                                             for more details.
     * @param bool|null                  $show_caption_above_media Optional. Pass True if the caption must be shown above the widget
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected string $widget_id,
        protected ?string $caption = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $caption_entities = null,
        protected ?string $chat_data = null,
        protected ?TelegramParseModeEnum $parse_mode = null,
        protected ?bool $show_caption_above_media = null,
    ) {}

    /**
     * @return string
     */
    public function getWidgetId(): string
    {
        return $this->widget_id;
    }

    /**
     * @param string $widget_id
     *
     * @return InputSharedWidgetMessageContent
     */
    public function setWidgetId(string $widget_id): InputSharedWidgetMessageContent
    {
        $this->widget_id = $widget_id;

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
     * @return InputSharedWidgetMessageContent
     */
    public function setCaption(?string $caption): InputSharedWidgetMessageContent
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
     * @return InputSharedWidgetMessageContent
     */
    public function setCaptionEntities(?array $caption_entities): InputSharedWidgetMessageContent
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
     * @return InputSharedWidgetMessageContent
     */
    public function setChatData(?string $chat_data): InputSharedWidgetMessageContent
    {
        $this->chat_data = $chat_data;

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
     * @return InputSharedWidgetMessageContent
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InputSharedWidgetMessageContent
    {
        $this->parse_mode = $parse_mode;

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
     * @return InputSharedWidgetMessageContent
     */
    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): InputSharedWidgetMessageContent
    {
        $this->show_caption_above_media = $show_caption_above_media;

        return $this;
    }
}
// endregion CLASS_InputSharedWidgetMessageContent
