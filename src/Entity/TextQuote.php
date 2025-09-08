<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 *
 * @link https://core.telegram.org/bots/api#textquote
 */
final class TextQuote implements EntityInterface
{
    /**
     * @param string $text Text of the quoted part of a message that is replied to by the given message
     * @param int $position Approximate quote position in the original message in UTF-16 code units as specified by the sender
     * @param MessageEntity[]|null $entities Optional. Special entities that appear in the quote. Currently, only bold, italic, underline,
     * strikethrough, spoiler, and custom_emoji entities are kept in quotes.
     * @param bool|null $is_manual Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was
     * added automatically by the server.
     *
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected string $text,
        protected int $position,
        #[ArrayType(MessageEntity::class)]
        protected ?array $entities = null,
        protected ?bool $is_manual = null,
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
     * @return TextQuote
     */
    public function setText(string $text): TextQuote
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     *
     * @return TextQuote
     */
    public function setPosition(int $position): TextQuote
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     *
     * @return TextQuote
     */
    public function setEntities(?array $entities): TextQuote
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsManual(): ?bool
    {
        return $this->is_manual;
    }

    /**
     * @param bool|null $is_manual
     *
     * @return TextQuote
     */
    public function setIsManual(?bool $is_manual): TextQuote
    {
        $this->is_manual = $is_manual;
        return $this;
    }
}
