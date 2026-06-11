<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API stopPoll method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#stoppoll
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Stop, Poll
// STRUCTURE: ▶ ┌chat_id + message_id + reply_markup + business_connection_id┐ → ◇ construct → ⊕ → ∑ ⟦StopPollRequest⟧

// region CLASS_StopPollRequest
/**
 * @see https://core.telegram.org/bots/api#stoppoll
 */
class StopPollRequest implements RequestInterface
{
    /**
     * @param ChatId                    $chat_id                Unique identifier for the target chat or username of the target bot, supergroup or channel in the format
     *                                                          \@username
     * @param int                       $message_id             Identifier of the original message with the poll
     * @param InlineKeyboardMarkup|null $reply_markup           a JSON-serialized object for a new message inline keyboard
     * @param string|null               $business_connection_id Unique identifier of the business connection on behalf of which the message to
     *                                                          be edited was sent
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?string $business_connection_id = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): StopPollRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): StopPollRequest
    {
        $this->message_id = $message_id;

        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): StopPollRequest
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): StopPollRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }
}
// endregion CLASS_StopPollRequest
