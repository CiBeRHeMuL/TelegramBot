<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;

/**
 * Describes a story area pointing to a suggested reaction. Currently, a story can have up to 5 suggested reaction areas.
 *
 * @link https://core.telegram.org/bots/api#storyareatypesuggestedreaction
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::SuggestedReaction->value))]
final class StoryAreaTypeSuggestedReaction extends AbstractStoryAreaType
{
    /**
     * @param AbstractReactionType $reaction_type Type of the reaction
     * @param bool|null $is_dark Optional. Pass True if the reaction area has a dark background
     * @param bool|null $is_flipped Optional. Pass True if reaction area corner is flipped
     *
     * @see https://core.telegram.org/bots/api#reactiontype ReactionType
     */
    public function __construct(
        protected AbstractReactionType $reaction_type,
        protected ?bool $is_dark = null,
        protected ?bool $is_flipped = null,
    ) {
        parent::__construct(StoryAreaTypeTypeEnum::SuggestedReaction);
    }

    /**
     * @return AbstractReactionType
     */
    public function getReactionType(): AbstractReactionType
    {
        return $this->reaction_type;
    }

    /**
     * @param AbstractReactionType $reaction_type
     *
     * @return StoryAreaTypeSuggestedReaction
     */
    public function setReactionType(AbstractReactionType $reaction_type): StoryAreaTypeSuggestedReaction
    {
        $this->reaction_type = $reaction_type;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsDark(): ?bool
    {
        return $this->is_dark;
    }

    /**
     * @param bool|null $is_dark
     *
     * @return StoryAreaTypeSuggestedReaction
     */
    public function setIsDark(?bool $is_dark): StoryAreaTypeSuggestedReaction
    {
        $this->is_dark = $is_dark;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFlipped(): ?bool
    {
        return $this->is_flipped;
    }

    /**
     * @param bool|null $is_flipped
     *
     * @return StoryAreaTypeSuggestedReaction
     */
    public function setIsFlipped(?bool $is_flipped): StoryAreaTypeSuggestedReaction
    {
        $this->is_flipped = $is_flipped;
        return $this;
    }
}
