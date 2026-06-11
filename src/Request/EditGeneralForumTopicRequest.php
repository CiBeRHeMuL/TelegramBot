<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API editGeneralForumTopic method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#editgeneralforumtopic
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Edit, General, Forum, Topic
// STRUCTURE: ▶ ┌chat_id + name┐ → ◇ construct → ⊕ → ∑ ⟦EditGeneralForumTopicRequest⟧

// region CLASS_EditGeneralForumTopicRequest
/**
 * @see https://core.telegram.org/bots/api#editgeneralforumtopic
 */
class EditGeneralForumTopicRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup in the format \@username
     * @param string $name    New topic name, 1-128 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private string $name,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): EditGeneralForumTopicRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): EditGeneralForumTopicRequest
    {
        $this->name = $name;

        return $this;
    }
}
// endregion CLASS_EditGeneralForumTopicRequest
