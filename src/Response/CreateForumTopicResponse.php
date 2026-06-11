<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ForumTopic;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API createForumTopic method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: create forum topic, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ ForumTopic

// region CLASS_CreateForumTopicResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class CreateForumTopicResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?ForumTopic $forumTopic = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getForumTopic(): ?ForumTopic
    {
        return $this->forumTopic;
    }
}

// endregion CLASS_CreateForumTopicResponse
