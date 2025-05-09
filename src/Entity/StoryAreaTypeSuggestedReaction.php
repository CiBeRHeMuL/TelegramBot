<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;
use stdClass;

/**
 * Describes a story area pointing to a suggested reaction. Currently, a story can have up to 5 suggested reaction areas.
 *
 * @link https://core.telegram.org/bots/api#storyareatypesuggestedreaction
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::SuggestedReaction->value))]
class StoryAreaTypeSuggestedReaction extends AbstractStoryAreaType
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
        protected bool|null $is_dark = null,
        protected bool|null $is_flipped = null,
    ) {
        parent::__construct(StoryAreaTypeTypeEnum::SuggestedReaction);
    }

    public function getReactionType(): AbstractReactionType
    {
        return $this->reaction_type;
    }

    public function setReactionType(AbstractReactionType $reaction_type): StoryAreaTypeSuggestedReaction
    {
        $this->reaction_type = $reaction_type;
        return $this;
    }

    public function getIsDark(): bool|null
    {
        return $this->is_dark;
    }

    public function setIsDark(bool|null $is_dark): StoryAreaTypeSuggestedReaction
    {
        $this->is_dark = $is_dark;
        return $this;
    }

    public function getIsFlipped(): bool|null
    {
        return $this->is_flipped;
    }

    public function setIsFlipped(bool|null $is_flipped): StoryAreaTypeSuggestedReaction
    {
        $this->is_flipped = $is_flipped;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'reaction_type' => $this->reaction_type->toArray(),
            'is_dark' => $this->is_dark,
            'is_flipped' => $this->is_flipped,
        ];
    }
}
