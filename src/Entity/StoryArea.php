<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_StoryArea
/**
 * Describes a clickable area on a story media.
 *
 * @see https://core.telegram.org/bots/api#storyarea
 */
final class StoryArea implements EntityInterface
{
    /**
     * @param AreaPosition          $position Position of the area
     * @param AbstractStoryAreaType $type     Type of the area
     *
     * @see https://core.telegram.org/bots/api#storyareaposition StoryAreaPosition
     * @see https://core.telegram.org/bots/api#storyareatype StoryAreaType
     */
    public function __construct(
        protected AreaPosition $position,
        protected AbstractStoryAreaType $type,
    ) {}

    /**
     * @return AreaPosition
     */
    public function getPosition(): AreaPosition
    {
        return $this->position;
    }

    /**
     * @param AreaPosition $position
     *
     * @return StoryArea
     */
    public function setPosition(AreaPosition $position): StoryArea
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

// endregion CLASS_StoryArea
