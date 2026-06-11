<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes the type of a clickable area on a story.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#storyareatype
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Location story area] => StoryAreaTypeLocation
 * CLASS 5[Suggested reaction story area] => StoryAreaTypeSuggestedReaction
 * CLASS 5[Link story area] => StoryAreaTypeLink
 * CLASS 5[Weather story area] => StoryAreaTypeWeather
 * CLASS 5[Unique gift story area] => StoryAreaTypeUniqueGift
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractStoryAreaType, Telegram Bot API, abstract, story, area, type, DTO
// STRUCTURE: ▶ ┌type: StoryAreaTypeTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractStoryAreaType [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * Describes the type of a clickable area on a story.
 *
 * @see https://core.telegram.org/bots/api#storyareatype
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
    ) {}

    public function getType(): StoryAreaTypeTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractStoryAreaType
