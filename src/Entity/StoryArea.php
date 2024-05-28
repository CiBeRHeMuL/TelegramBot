<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a clickable area on a story media.
 *
 * @link https://core.telegram.org/bots/api#storyarea
 */
class StoryArea extends AbstractEntity
{
    /**
     * @param StoryAreaPosition $position Position of the area
     * @param AbstractStoryAreaType $type Type of the area
     *
     * @see https://core.telegram.org/bots/api#storyareaposition StoryAreaPosition
     * @see https://core.telegram.org/bots/api#storyareatype AbstractStoryAreaType
     */
    public function __construct(
        protected StoryAreaPosition $position,
        protected AbstractStoryAreaType $type,
    ) {
        parent::__construct();
    }

    public function getPosition(): StoryAreaPosition
    {
        return $this->position;
    }

    public function setPosition(StoryAreaPosition $position): StoryArea
    {
        $this->position = $position;
        return $this;
    }

    public function getType(): AbstractStoryAreaType
    {
        return $this->type;
    }

    public function setType(AbstractStoryAreaType $type): StoryArea
    {
        $this->type = $type;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'position' => $this->position->toArray(),
            'type' => $this->type->toArray(),
        ];
    }
}
