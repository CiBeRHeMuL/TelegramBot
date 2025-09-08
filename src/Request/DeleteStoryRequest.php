<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#deletestory
 */
class DeleteStoryRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param int $story_id Unique identifier of the story to delete
     */
    public function __construct(
        private string $business_connection_id,
        private int $story_id,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): DeleteStoryRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getStoryId(): int
    {
        return $this->story_id;
    }

    public function setStoryId(int $story_id): DeleteStoryRequest
    {
        $this->story_id = $story_id;
        return $this;
    }
}
