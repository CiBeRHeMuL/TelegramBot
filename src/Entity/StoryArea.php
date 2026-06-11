<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a story area containing interactive elements.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#storyarea
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StoryArea, Telegram, Bot API, DTO, storyarea
// STRUCTURE: ▶ ┌position: StoryAreaPosition,type: StoryAreaType┐ → ∑ StoryArea
// region CLASS_StoryArea

/**
 * Describes a clickable area on a story media.
 *
 * @see https://core.telegram.org/bots/api#storyarea
 */
final class StoryArea implements EntityInterface
{
    /**
     * @param StoryAreaPosition     $position Position of the area
     * @param AbstractStoryAreaType $type     Type of the area
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

// endregion CLASS_StoryArea
