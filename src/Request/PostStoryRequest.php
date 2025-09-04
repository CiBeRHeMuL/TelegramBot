<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputStoryContent;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\StoryArea;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

/**
 * @link https://core.telegram.org/bots/api#poststory
 */
class PostStoryRequest implements RequestInterface
{
    /**
     * @param int $active_period Period after which the story is moved to the archive, in seconds; must be one of 6 * 3600, 12 *
     * 3600, 86400, or 2 * 86400
     * @param string $business_connection_id Unique identifier of the business connection
     * @param AbstractInputStoryContent $content Content of the story
     * @param StoryArea[]|null $areas A JSON-serialized list of clickable areas to be shown on the story
     * @param string|null $caption Caption of the story, 0-2048 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the story caption. See formatting options for more
     * details.
     * @param bool|null $post_to_chat_page Pass True to keep the story accessible after it expires
     * @param bool|null $protect_content Pass True if the content of the story must be protected from forwarding and screenshotting
     *
     * @see https://core.telegram.org/bots/api#inputstorycontent InputStoryContent
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#storyarea StoryArea
     */
    public function __construct(
        private int $active_period,
        private string $business_connection_id,
        private AbstractInputStoryContent $content,
        private array|null $areas = null,
        private string|null $caption = null,
        private array|null $caption_entities = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private bool|null $post_to_chat_page = null,
        private bool|null $protect_content = null,
    ) {
    }

    public function getActivePeriod(): int
    {
        return $this->active_period;
    }

    public function setActivePeriod(int $active_period): PostStoryRequest
    {
        $this->active_period = $active_period;
        return $this;
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): PostStoryRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getContent(): AbstractInputStoryContent
    {
        return $this->content;
    }

    public function setContent(AbstractInputStoryContent $content): PostStoryRequest
    {
        $this->content = $content;
        return $this;
    }

    public function getAreas(): array|null
    {
        return $this->areas;
    }

    public function setAreas(array|null $areas): PostStoryRequest
    {
        $this->areas = $areas;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): PostStoryRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): PostStoryRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): PostStoryRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getPostToChatPage(): bool|null
    {
        return $this->post_to_chat_page;
    }

    public function setPostToChatPage(bool|null $post_to_chat_page): PostStoryRequest
    {
        $this->post_to_chat_page = $post_to_chat_page;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): PostStoryRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }
}
