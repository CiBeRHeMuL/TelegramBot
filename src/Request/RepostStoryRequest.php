<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#repoststory
 */
class RepostStoryRequest implements RequestInterface
{
    /**
     * @param int $active_period Period after which the story is moved to the archive, in seconds; must be one of 6 * 3600, 12 *
     * 3600, 86400, or 2 * 86400
     * @param string $business_connection_id Unique identifier of the business connection
     * @param ChatId $from_chat_id Unique identifier of the chat which posted the story that should be reposted
     * @param int $from_story_id Unique identifier of the story that should be reposted
     * @param bool|null $post_to_chat_page Pass True to keep the story accessible after it expires
     * @param bool|null $protect_content Pass True if the content of the story must be protected from forwarding and screenshotting
     */
    public function __construct(
        private int $active_period,
        private string $business_connection_id,
        private ChatId $from_chat_id,
        private int $from_story_id,
        private ?bool $post_to_chat_page = null,
        private ?bool $protect_content = null,
    ) {}

    public function getActivePeriod(): int
    {
        return $this->active_period;
    }

    public function setActivePeriod(int $active_period): RepostStoryRequest
    {
        $this->active_period = $active_period;
        return $this;
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): RepostStoryRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getFromChatId(): ChatId
    {
        return $this->from_chat_id;
    }

    public function setFromChatId(ChatId $from_chat_id): RepostStoryRequest
    {
        $this->from_chat_id = $from_chat_id;
        return $this;
    }

    public function getFromStoryId(): int
    {
        return $this->from_story_id;
    }

    public function setFromStoryId(int $from_story_id): RepostStoryRequest
    {
        $this->from_story_id = $from_story_id;
        return $this;
    }

    public function getPostToChatPage(): ?bool
    {
        return $this->post_to_chat_page;
    }

    public function setPostToChatPage(?bool $post_to_chat_page): RepostStoryRequest
    {
        $this->post_to_chat_page = $post_to_chat_page;
        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): RepostStoryRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }
}
