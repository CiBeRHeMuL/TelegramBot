<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 * @link https://core.telegram.org/bots/api#textquote
 */
class TextQuote extends AbstractEntity
{
    /**
     * @param string $text Text of the quoted part of a message that is replied to by the given message.
     * @param MessageEntity[]|null $entities Optional.
     * Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough,
     * spoiler, and custom_emoji entities are kept in quotes.
     * @param int $position Approximate quote position in the original message in UTF-16 code units as specified by the sender.
     * @param bool|null $is_manual Optional. True, if the quote was chosen manually by the message sender.
     * Otherwise, the quote was added automatically by the server.
     */
    public function __construct(
        protected string $text,
        protected int $position,
        #[ArrayType(MessageEntity::class)] protected array|null $entities = null,
        protected bool|null $is_manual = null,
    ) {
        parent::__construct();
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): TextQuote
    {
        $this->text = $text;
        return $this;
    }

    public function getEntities(): array|null
    {
        return $this->entities;
    }

    public function setEntities(array $entities): TextQuote
    {
        $this->entities = $entities;
        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): TextQuote
    {
        $this->position = $position;
        return $this;
    }

    public function getIsManual(): bool|null
    {
        return $this->is_manual;
    }

    public function setIsManual(bool|null $is_manual): TextQuote
    {
        $this->is_manual = $is_manual;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
            'entities' => $this->entities !== null
                ? array_map(fn(MessageEntity $me) => $me->toArray(), $this->entities)
                : null,
            'position' => $this->position,
            'is_manual' => $this->is_manual,
        ];
    }
}
