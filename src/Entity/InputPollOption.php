<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use stdClass;

/**
 * This object contains information about one answer option in a poll to send.
 * @link https://core.telegram.org/bots/api#inputpolloption
 */
class InputPollOption implements EntityInterface
{
    /**
     * @param string $text Option text, 1-100 characters
     * @param TelegramParseModeEnum|null $text_parse_mode Optional. Mode for parsing entities in the text.
     * See formatting options for more details. Currently, only custom emoji entities are allowed
     * @param array|null $text_entities Optional. A JSON-serialized list of special entities that appear in the poll option text.
     * It can be specified instead of text_parse_mode
     */
    public function __construct(
        private string $text,
        private TelegramParseModeEnum|null $text_parse_mode = null,
        #[ArrayType(MessageEntity::class)] private array|null $text_entities = null,
    ) {
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): InputPollOption
    {
        $this->text = $text;
        return $this;
    }

    public function getTextParseMode(): TelegramParseModeEnum|null
    {
        return $this->text_parse_mode;
    }

    public function setTextParseMode(TelegramParseModeEnum|null $text_parse_mode): InputPollOption
    {
        $this->text_parse_mode = $text_parse_mode;
        return $this;
    }

    public function getTextEntities(): array|null
    {
        return $this->text_entities;
    }

    public function setTextEntities(array|null $text_entities): InputPollOption
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
            'text_parse_mode' => $this->text_parse_mode?->value,
            'text_entities' => $this->text_entities !== null
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->text_entities)
                : null,
        ];
    }
}
