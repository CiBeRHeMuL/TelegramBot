<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteMessages method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deletemessages
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, Messages
// STRUCTURE: ▶ ┌chat_id + message_ids┐ → ◇ construct → ⊕ → ∑ ⟦DeleteMessagesRequest⟧

// region CLASS_DeleteMessagesRequest
/**
 * @see https://core.telegram.org/bots/api#deletemessages
 */
class DeleteMessagesRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id     Unique identifier for the target chat or username of the target bot, supergroup or channel in the format
     *                            \@username
     * @param int[]  $message_ids A JSON-serialized list of 1-100 identifiers of messages to delete. See deleteMessage for limitations
     *                            on which messages can be deleted
     *
     * @see https://core.telegram.org/bots/api#deletemessage deleteMessage
     */
    public function __construct(
        private ChatId $chat_id,
        private array $message_ids,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeleteMessagesRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getMessageIds(): array
    {
        return $this->message_ids;
    }

    public function setMessageIds(array $message_ids): DeleteMessagesRequest
    {
        $this->message_ids = $message_ids;

        return $this;
    }
}
// endregion CLASS_DeleteMessagesRequest
