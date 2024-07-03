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
 * @link https://core.telegram.org/bots/api#inputtextmessagecontent
 */
#[BuildIf(new FieldCompareChecker('message_text', null, CompareOperatorEnum::StrictNotEqual))]
class InputTextMessageContent extends AbstractEntity
{
    /**
     * @param string $message_text Text of the message to be sent, 1-4096 characters
     * @param MessageEntity[]|null $entities Optional. List of special entities that appear in message text, which can be specified
     * instead of parse_mode
     * @param LinkPreviewOptions|null $link_preview_options Optional. Link preview generation options for the message
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the message text. See formatting options
     * for more details.
     */
    public function __construct(
        protected string $message_text,
        #[ArrayType(MessageEntity::class)] protected array|null $entities = null,
        protected LinkPreviewOptions|null $link_preview_options = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
    ) {
        parent::__construct();
    }

    public function getMessageText(): string
    {
        return $this->message_text;
    }

    public function setMessageText(string $message_text): InputTextMessageContent
    {
        $this->message_text = $message_text;
        return $this;
    }

    public function getEntities(): array|null
    {
        return $this->entities;
    }

    public function setEntities(array|null $entities): InputTextMessageContent
    {
        $this->entities = $entities;
        return $this;
    }

    public function getLinkPreviewOptions(): LinkPreviewOptions|null
    {
        return $this->link_preview_options;
    }

    public function setLinkPreviewOptions(LinkPreviewOptions|null $link_preview_options): InputTextMessageContent
    {
        $this->link_preview_options = $link_preview_options;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputTextMessageContent
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'message_text' => $this->message_text,
            'entities' => $this->entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->entities)
                : null,
            'link_preview_options' => $this->link_preview_options?->toArray(),
            'parse_mode' => $this->parse_mode?->value,
        ];
    }
}
