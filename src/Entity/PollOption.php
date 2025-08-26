<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object contains information about one answer option in a poll.
 *
 * @link https://core.telegram.org/bots/api#polloption
 */
final class PollOption implements EntityInterface
{
    /**
     * @param string $text Option text, 1-100 characters
     * @param int $voter_count Number of users that voted for this option
     * @param MessageEntity[]|null $text_entities Optional. Special entities that appear in the option text. Currently, only custom
     * emoji entities are allowed in poll option texts
     *
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected string $text,
        protected int $voter_count,
        #[ArrayType(MessageEntity::class)]
        protected array|null $text_entities = null,
    ) {
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
     * @return PollOption
     */
    public function setText(string $text): PollOption
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return int
     */
    public function getVoterCount(): int
    {
        return $this->voter_count;
    }

    /**
     * @param int $voter_count
     *
     * @return PollOption
     */
    public function setVoterCount(int $voter_count): PollOption
    {
        $this->voter_count = $voter_count;
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
     * @return PollOption
     */
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
            'text_entities' => $this->text_entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->text_entities,
                )
                : null,
        ];
    }
}
