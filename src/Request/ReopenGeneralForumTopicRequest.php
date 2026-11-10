<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region CLASS_ReopenGeneralForumTopicRequest
/**
 * @see https://core.telegram.org/bots/api#reopengeneralforumtopic
 */
class ReopenGeneralForumTopicRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup in the format \@username
     */
    public function __construct(
        private ChatId $chat_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): ReopenGeneralForumTopicRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }
}
// endregion CLASS_ReopenGeneralForumTopicRequest
