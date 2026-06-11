<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInlineQueryResult;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API answerGuestQuery method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#answerguestquery
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Answer, Guest, Query
// STRUCTURE: ▶ ┌guest_query_id + result┐ → ◇ construct → ⊕ → ∑ ⟦AnswerGuestQueryRequest⟧

// region CLASS_AnswerGuestQueryRequest
/**
 * @see https://core.telegram.org/bots/api#answerguestquery
 */
class AnswerGuestQueryRequest implements RequestInterface
{
    /**
     * @param string                    $guest_query_id Unique identifier for the query to be answered
     * @param AbstractInlineQueryResult $result         A JSON-serialized object describing the message to be sent
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresult InlineQueryResult
     */
    public function __construct(
        private string $guest_query_id,
        private AbstractInlineQueryResult $result,
    ) {}

    public function getGuestQueryId(): string
    {
        return $this->guest_query_id;
    }

    public function setGuestQueryId(string $guest_query_id): AnswerGuestQueryRequest
    {
        $this->guest_query_id = $guest_query_id;

        return $this;
    }

    public function getResult(): AbstractInlineQueryResult
    {
        return $this->result;
    }

    public function setResult(AbstractInlineQueryResult $result): AnswerGuestQueryRequest
    {
        $this->result = $result;

        return $this;
    }
}
// endregion CLASS_AnswerGuestQueryRequest
