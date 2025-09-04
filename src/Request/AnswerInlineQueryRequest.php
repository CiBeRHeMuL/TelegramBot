<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInlineQueryResult;
use AndrewGos\TelegramBot\Entity\InlineQueryResultsButton;

/**
 * @link https://core.telegram.org/bots/api#answerinlinequery
 */
class AnswerInlineQueryRequest implements RequestInterface
{
    /**
     * @param string $inline_query_id Unique identifier for the answered query
     * @param AbstractInlineQueryResult[] $results A JSON-serialized array of results for the inline query
     * @param InlineQueryResultsButton|null $button A JSON-serialized object describing a button to be shown above inline query results
     * @param int|null $cache_time The maximum amount of time in seconds that the result of the inline query may be cached on the
     * server. Defaults to 300.
     * @param bool|null $is_personal Pass True if results may be cached on the server side only for the user that sent the query.
     * By default, results may be returned to any user who sends the same query.
     * @param string|null $next_offset Pass the offset that a client should send in the next query with the same text to receive
     * more results. Pass an empty string if there are no more results or if you don't support pagination. Offset length can't exceed
     * 64 bytes.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresult InlineQueryResult
     * @see https://core.telegram.org/bots/api#inlinequeryresultsbutton InlineQueryResultsButton
     */
    public function __construct(
        private string $inline_query_id,
        private array $results,
        private InlineQueryResultsButton|null $button = null,
        private int|null $cache_time = null,
        private bool|null $is_personal = null,
        private string|null $next_offset = null,
    ) {
    }

    public function getInlineQueryId(): string
    {
        return $this->inline_query_id;
    }

    public function setInlineQueryId(string $inline_query_id): AnswerInlineQueryRequest
    {
        $this->inline_query_id = $inline_query_id;
        return $this;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function setResults(array $results): AnswerInlineQueryRequest
    {
        $this->results = $results;
        return $this;
    }

    public function getButton(): InlineQueryResultsButton|null
    {
        return $this->button;
    }

    public function setButton(InlineQueryResultsButton|null $button): AnswerInlineQueryRequest
    {
        $this->button = $button;
        return $this;
    }

    public function getCacheTime(): int|null
    {
        return $this->cache_time;
    }

    public function setCacheTime(int|null $cache_time): AnswerInlineQueryRequest
    {
        $this->cache_time = $cache_time;
        return $this;
    }

    public function getIsPersonal(): bool|null
    {
        return $this->is_personal;
    }

    public function setIsPersonal(bool|null $is_personal): AnswerInlineQueryRequest
    {
        $this->is_personal = $is_personal;
        return $this;
    }

    public function getNextOffset(): string|null
    {
        return $this->next_offset;
    }

    public function setNextOffset(string|null $next_offset): AnswerInlineQueryRequest
    {
        $this->next_offset = $next_offset;
        return $this;
    }
}
