<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Represents a reaction added to a message along with the number of times it was added.
 *
 * @link https://core.telegram.org/bots/api#reactioncount
 */
final class ReactionCount implements EntityInterface
{
    /**
     * @param AbstractReactionType $type Type of the reaction
     * @param int $total_count Number of times the reaction was added
     *
     * @see https://core.telegram.org/bots/api#reactiontype ReactionType
     */
    public function __construct(
        protected AbstractReactionType $type,
        protected int $total_count,
    ) {
    }

    /**
     * @return AbstractReactionType
     */
    public function getType(): AbstractReactionType
    {
        return $this->type;
    }

    /**
     * @param AbstractReactionType $type
     *
     * @return ReactionCount
     */
    public function setType(AbstractReactionType $type): ReactionCount
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     *
     * @return ReactionCount
     */
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
