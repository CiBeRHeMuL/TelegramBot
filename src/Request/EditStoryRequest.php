<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputStoryContent;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\StoryArea;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

class EditStoryRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param AbstractInputStoryContent $content Content of the story
     * @param int $story_id Unique identifier of the story to edit
     * @param StoryArea[]|null $areas A JSON-serialized list of clickable areas to be shown on the story
     * @param string|null $caption Caption of the story, 0-2048 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the story caption. See formatting options for more
     * details.
     */
    public function __construct(
        private string $business_connection_id,
        private AbstractInputStoryContent $content,
        private int $story_id,
        private array|null $areas = null,
        private string|null $caption = null,
        private array|null $caption_entities = null,
        private TelegramParseModeEnum|null $parse_mode = null,
    ) {
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): EditStoryRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getContent(): AbstractInputStoryContent
    {
        return $this->content;
    }

    public function setContent(AbstractInputStoryContent $content): EditStoryRequest
    {
        $this->content = $content;
        return $this;
    }

    public function getStoryId(): int
    {
        return $this->story_id;
    }

    public function setStoryId(int $story_id): EditStoryRequest
    {
        $this->story_id = $story_id;
        return $this;
    }

    public function getAreas(): array|null
    {
        return $this->areas;
    }

    public function setAreas(array|null $areas): EditStoryRequest
    {
        $this->areas = $areas;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): EditStoryRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): EditStoryRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): EditStoryRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'business_connection_id' => $this->business_connection_id,
            'content' => $this->content->toArray(),
            'story_id' => $this->story_id,
            'areas' => $this->areas
                ? array_map(fn(StoryArea $e) => $e->toArray(), $this->areas)
                : null,
            'caption' => $this->caption,
            'caption_entities' => $this->caption_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->caption_entities)
                : null,
            'parse_mode' => $this->parse_mode?->value,
        ];
    }
}
