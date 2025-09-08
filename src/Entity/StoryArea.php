<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes a clickable area on a story media.
 *
 * @link https://core.telegram.org/bots/api#storyarea
 */
final class StoryArea implements EntityInterface
{
    /**
     * @param StoryAreaPosition $position Position of the area
     * @param AbstractStoryAreaType $type Type of the area
     *
     * @see https://core.telegram.org/bots/api#storyareaposition StoryAreaPosition
     * @see https://core.telegram.org/bots/api#storyareatype StoryAreaType
     */
    public function __construct(
        protected StoryAreaPosition $position,
        protected AbstractStoryAreaType $type,
    ) {}

    /**
     * @return StoryAreaPosition
     */
    public function getPosition(): StoryAreaPosition
    {
        return $this->position;
    }

    /**
     * @param StoryAreaPosition $position
     *
     * @return StoryArea
     */
    public function setPosition(StoryAreaPosition $position): StoryArea
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return AbstractStoryAreaType
     */
    public function getType(): AbstractStoryAreaType
    {
        return $this->type;
    }

    /**
     * @param AbstractStoryAreaType $type
     *
     * @return StoryArea
     */
    public function setType(AbstractStoryAreaType $type): StoryArea
    {
        $this->type = $type;
        return $this;
    }
}
