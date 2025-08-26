<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;

/**
 * Describes the type of a clickable area on a story.
 * @link https://core.telegram.org/bots/api#storyareatype
 */
#[AvailableInheritors([
    StoryAreaTypeLocation::class,
    StoryAreaTypeSuggestedReaction::class,
    StoryAreaTypeLink::class,
    StoryAreaTypeWeather::class,
    StoryAreaTypeUniqueGift::class,
])]
abstract class AbstractStoryAreaType implements EntityInterface
{
    public function __construct(
        protected readonly StoryAreaTypeTypeEnum $type,
    ) {
    }

    public function getType(): StoryAreaTypeTypeEnum
    {
        return $this->type;
    }
}
