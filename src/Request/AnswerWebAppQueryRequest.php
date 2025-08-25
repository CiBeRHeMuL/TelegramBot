<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInlineQueryResult;

/**
 * @link https://core.telegram.org/bots/api#answerwebappquery
 */
class AnswerWebAppQueryRequest implements RequestInterface
{
    /**
     * @param AbstractInlineQueryResult $result A JSON-serialized object describing the message to be sent
     * @param string $web_app_query_id Unique identifier for the query to be answered
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresult InlineQueryResult
     */
    public function __construct(
        private AbstractInlineQueryResult $result,
        private string $web_app_query_id,
    ) {
    }

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

    public function toArray(): array
    {
        return [
            'result' => $this->result->toArray(),
            'web_app_query_id' => $this->web_app_query_id,
        ];
    }
}
