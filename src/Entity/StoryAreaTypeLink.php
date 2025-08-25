<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Describes a story area pointing to an HTTP or tg:// link. Currently, a story can have up to 3 link areas.
 *
 * @link https://core.telegram.org/bots/api#storyareatypelink
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::Link->value))]
class StoryAreaTypeLink extends AbstractStoryAreaType
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

    public function toArray(): array|stdClass
    {
        return [
            'url' => $this->url->getUrl(),
            'type' => $this->type->value,
        ];
    }
}
