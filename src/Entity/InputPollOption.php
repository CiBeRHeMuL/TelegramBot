<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

/**
 * This object contains information about one answer option in a poll to be sent.
 *
 * @link https://core.telegram.org/bots/api#inputpolloption
 */
final class InputPollOption implements EntityInterface
{
    /**
     * @param string $text Option text, 1-100 characters
     * @param TelegramParseModeEnum|null $text_parse_mode Optional. Mode for parsing entities in the text. See formatting options
     * for more details. Currently, only custom emoji entities are allowed
     * @param MessageEntity[]|null $text_entities Optional. A JSON-serialized list of special entities that appear in the poll option
     * text. It can be specified instead of text_parse_mode
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected string $text,
        protected ?TelegramParseModeEnum $text_parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $text_entities = null,
    ) {}

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return InputPollOption
     */
    public function setText(string $text): InputPollOption
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getTextParseMode(): ?TelegramParseModeEnum
    {
        return $this->text_parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $text_parse_mode
     *
     * @return InputPollOption
     */
    public function setTextParseMode(?TelegramParseModeEnum $text_parse_mode): InputPollOption
    {
        $this->text_parse_mode = $text_parse_mode;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): ?array
    {
        return $this->text_entities;
    }

    /**
     * @param MessageEntity[]|null $text_entities
     *
     * @return InputPollOption
     */
    public function setTextEntities(?array $text_entities): InputPollOption
    {
        $this->text_entities = $text_entities;
        return $this;
    }
}
