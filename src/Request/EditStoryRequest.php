<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputStoryContent;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\StoryArea;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

/**
 * @link https://core.telegram.org/bots/api#editstory
 */
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
     *
     * @see https://core.telegram.org/bots/api#inputstorycontent InputStoryContent
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#storyarea StoryArea
     */
    public function __construct(
        private string $business_connection_id,
        private AbstractInputStoryContent $content,
        private int $story_id,
        private ?array $areas = null,
        private ?string $caption = null,
        private ?array $caption_entities = null,
        private ?TelegramParseModeEnum $parse_mode = null,
    ) {}

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

    public function getAreas(): ?array
    {
        return $this->areas;
    }

    public function setAreas(?array $areas): EditStoryRequest
    {
        $this->areas = $areas;
        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): EditStoryRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): EditStoryRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): EditStoryRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }
}
