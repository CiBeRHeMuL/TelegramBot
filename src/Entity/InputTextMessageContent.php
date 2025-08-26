<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use stdClass;

/**
 * Represents the content of a text message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent content
 * @link https://core.telegram.org/bots/api#inputtextmessagecontent
 */
#[BuildIf(new FieldCompareChecker('message_text', null, CompareOperatorEnum::StrictNotEqual))]
final class InputTextMessageContent implements EntityInterface
{
    /**
     * @param string $message_text Text of the message to be sent, 1-4096 characters
     * @param MessageEntity[]|null $entities Optional. List of special entities that appear in message text, which can be specified
     * instead of parse_mode
     * @param LinkPreviewOptions|null $link_preview_options Optional. Link preview generation options for the message
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the message text. See formatting options
     * for more details.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#linkpreviewoptions LinkPreviewOptions
     */
    public function __construct(
        protected string $message_text,
        #[ArrayType(MessageEntity::class)]
        protected array|null $entities = null,
        protected LinkPreviewOptions|null $link_preview_options = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
    ) {
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->message_text;
    }

    /**
     * @param string $message_text
     *
     * @return InputTextMessageContent
     */
    public function setMessageText(string $message_text): InputTextMessageContent
    {
        $this->message_text = $message_text;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): array|null
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     *
     * @return InputTextMessageContent
     */
    public function setEntities(array|null $entities): InputTextMessageContent
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions(): LinkPreviewOptions|null
    {
        return $this->link_preview_options;
    }

    /**
     * @param LinkPreviewOptions|null $link_preview_options
     *
     * @return InputTextMessageContent
     */
    public function setLinkPreviewOptions(LinkPreviewOptions|null $link_preview_options): InputTextMessageContent
    {
        $this->link_preview_options = $link_preview_options;
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
     * @return InputTextMessageContent
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputTextMessageContent
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'message_text' => $this->message_text,
            'entities' => $this->entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->entities,
                )
                : null,
            'link_preview_options' => $this->link_preview_options?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
        ];
    }
}
