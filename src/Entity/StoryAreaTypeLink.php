<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a story area type that contains a link.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#storyareatypelink
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StoryAreaTypeLink, Telegram, Bot API, DTO, storyareatypelink
// STRUCTURE: ▶ ┌type,url┐ → ∑ StoryAreaTypeLink
// region CLASS_StoryAreaTypeLink

/**
 * Describes a story area pointing to an HTTP or tg:// link. Currently, a story can have up to 3 link areas.
 *
 * @see https://core.telegram.org/bots/api#storyareatypelink
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::Link->value))]
final class StoryAreaTypeLink extends AbstractStoryAreaType
{
    /**
     * @param Url $url HTTP or tg:// URL to be opened when the area is clicked
     */
    public function __construct(
        protected Url $url,
    ) {
        parent::__construct(StoryAreaTypeTypeEnum::Link);
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return StoryAreaTypeLink
     */
    public function setUrl(Url $url): StoryAreaTypeLink
    {
        $this->url = $url;

        return $this;
    }
}

// endregion CLASS_StoryAreaTypeLink
