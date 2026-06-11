<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a reaction count for a message.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#reactioncount
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ReactionCount, Telegram, Bot API, DTO, reactioncount
// STRUCTURE: ▶ ┌type: ReactionType,total_count┐ → ∑ count
// region CLASS_ReactionCount

/**
 * Represents a reaction added to a message along with the number of times it was added.
 *
 * @see https://core.telegram.org/bots/api#reactioncount
 */
final class ReactionCount implements EntityInterface
{
    /**
     * @param AbstractReactionType $type        Type of the reaction
     * @param int                  $total_count Number of times the reaction was added
     *
     * @see https://core.telegram.org/bots/api#reactiontype ReactionType
     */
    public function __construct(
        protected AbstractReactionType $type,
        protected int $total_count,
    ) {}

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
}

// endregion CLASS_ReactionCount
