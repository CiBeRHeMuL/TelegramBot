<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a single task in a checklist.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputchecklisttask
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputChecklistTask, Telegram, Bot API, DTO, inputchecklisttask
// STRUCTURE: ▶ ┌text┐ → ◇ is_checked → ∑ InputChecklistTask
// region CLASS_InputChecklistTask

/**
 * Describes a task to add to a checklist.
 *
 * @see https://core.telegram.org/bots/api#inputchecklisttask
 */
final class InputChecklistTask implements EntityInterface
{
    /**
     * @param int                        $id            Unique identifier of the task; must be positive and unique among all task identifiers currently present in
     *                                                  the checklist
     * @param string                     $text          Text of the task; 1-100 characters after entities parsing
     * @param TelegramParseModeEnum|null $parse_mode    Optional. Mode for parsing entities in the text. See formatting options for
     *                                                  more details.
     * @param MessageEntity[]|null       $text_entities Optional. List of special entities that appear in the text, which can be specified
     *                                                  instead of parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, custom_emoji, and date_time entities
     *                                                  are allowed.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected int $id,
        protected string $text,
        protected ?TelegramParseModeEnum $parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $text_entities = null,
    ) {}

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
    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $parse_mode
     *
     * @return InputChecklistTask
     */
    public function setParseMode(?TelegramParseModeEnum $parse_mode): InputChecklistTask
    {
        $this->parse_mode = $parse_mode;

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
     * @return InputChecklistTask
     */
    public function setTextEntities(?array $text_entities): InputChecklistTask
    {
        $this->text_entities = $text_entities;

        return $this;
    }
}

// endregion CLASS_InputChecklistTask
