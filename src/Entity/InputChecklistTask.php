<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use stdClass;

/**
 * Describes a task to add to a checklist.
 *
 * @link https://core.telegram.org/bots/api#inputchecklisttask
 */
class InputChecklistTask extends AbstractEntity
{
    /**
     * @param int $id Unique identifier of the task; must be positive and unique among all task identifiers currently present in
     * the checklist
     * @param string $text Text of the task; 1-100 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the text. See formatting options for
     * more details.
     * @param MessageEntity[]|null $text_entities Optional. List of special entities that appear in the text, which can be specified
     * instead of parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are allowed.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected int $id,
        protected string $text,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected array|null $text_entities = null,
    ) {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return InputChecklistTask
     */
    public function setId(int $id): InputChecklistTask
    {
        $this->id = $id;
        return $this;
    }

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
     * @return InputChecklistTask
     */
    public function setText(string $text): InputChecklistTask
    {
        $this->text = $text;
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
     * @return InputChecklistTask
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputChecklistTask
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): array|null
    {
        return $this->text_entities;
    }

    /**
     * @param MessageEntity[]|null $text_entities
     *
     * @return InputChecklistTask
     */
    public function setTextEntities(array|null $text_entities): InputChecklistTask
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'parse_mode' => $this->parse_mode?->value,
            'text_entities' => $this->text_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->text_entities)
                : null,
        ];
    }
}
