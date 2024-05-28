<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object contains information about one answer option in a poll.
 * @link https://core.telegram.org/bots/api#polloption
 */
class PollOption implements EntityInterface
{
    /**
     * @param string $text Option text, 1-100 characters.
     * @param int $voter_count Number of users that voted for this option.
     * @param MessageEntity[]|null $text_entities Optional. Special entities that appear in the option text.
     * Currently, only custom emoji entities are allowed in poll option texts
     */
    public function __construct(
        private string $text,
        private int $voter_count,
        private array|null $text_entities,
    ) {
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): PollOption
    {
        $this->text = $text;
        return $this;
    }

    public function getVoterCount(): int
    {
        return $this->voter_count;
    }

    public function setVoterCount(int $voter_count): PollOption
    {
        $this->voter_count = $voter_count;
        return $this;
    }

    public function getTextEntities(): array|null
    {
        return $this->text_entities;
    }

    public function setTextEntities(array|null $text_entities): PollOption
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
            'voter_count' => $this->voter_count,
            'text_entities' => $this->text_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->text_entities)
                : null,
        ];
    }
}
