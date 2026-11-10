<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;

// region CLASS_StoryAreaTypeUniqueGift
/**
 * Describes a story area pointing to a unique gift. Currently, a story can have at most 1 unique gift area.
 *
 * @see https://core.telegram.org/bots/api#storyareatypeuniquegift
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::UniqueGift->value))]
final class StoryAreaTypeUniqueGift extends AbstractStoryAreaType
{
    /**
     * @param string $name Unique name of the gift
     */
    public function __construct(
        protected string $name,
    ) {
        parent::__construct(StoryAreaTypeTypeEnum::UniqueGift);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return StoryAreaTypeUniqueGift
     */
    public function setName(string $name): StoryAreaTypeUniqueGift
    {
        $this->name = $name;

        return $this;
    }
}

// endregion CLASS_StoryAreaTypeUniqueGift
