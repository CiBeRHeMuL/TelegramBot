<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInlineQueryResult;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API answerWebAppQuery method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#answerwebappquery
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Answer, Web, App, Query
// STRUCTURE: ▶ ┌result + web_app_query_id┐ → ◇ construct → ⊕ → ∑ ⟦AnswerWebAppQueryRequest⟧

// region CLASS_AnswerWebAppQueryRequest
/**
 * @see https://core.telegram.org/bots/api#answerwebappquery
 */
class AnswerWebAppQueryRequest implements RequestInterface
{
    /**
     * @param AbstractInlineQueryResult $result           A JSON-serialized object describing the message to be sent
     * @param string                    $web_app_query_id Unique identifier for the query to be answered
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresult InlineQueryResult
     */
    public function __construct(
        private AbstractInlineQueryResult $result,
        private string $web_app_query_id,
    ) {}

    public function getResult(): AbstractInlineQueryResult
    {
        return $this->result;
    }

    public function setResult(AbstractInlineQueryResult $result): AnswerWebAppQueryRequest
    {
        $this->result = $result;

        return $this;
    }

    public function getWebAppQueryId(): string
    {
        return $this->web_app_query_id;
    }

    public function setWebAppQueryId(string $web_app_query_id): AnswerWebAppQueryRequest
    {
        $this->web_app_query_id = $web_app_query_id;

        return $this;
    }
}
// endregion CLASS_AnswerWebAppQueryRequest
