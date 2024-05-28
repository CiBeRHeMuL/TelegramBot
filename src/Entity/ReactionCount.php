<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Represents a reaction added to a message along with the number of times it was added.
 * @link https://core.telegram.org/bots/api#reactioncount
 */
class ReactionCount extends AbstractEntity
{
    /**
     * @param AbstractReactionType $type Type of the reaction
     * @param int $total_count Number of times the reaction was added
     */
    public function __construct(
        protected AbstractReactionType $type,
        protected int $total_count,
    ) {
        parent::__construct();
    }

    public function getType(): AbstractReactionType
    {
        return $this->type;
    }

    public function setType(AbstractReactionType $type): ReactionCount
    {
        $this->type = $type;
        return $this;
    }

    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    public function setTotalCount(int $total_count): ReactionCount
    {
        $this->total_count = $total_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->toArray(),
            'total_count' => $this->total_count,
        ];
    }
}
