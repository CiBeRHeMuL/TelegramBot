<?php

namespace AndrewGos\TelegramBot\Request;

// region CLASS_AnswerWidgetQueryRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#answerwidgetquery
 */
class AnswerWidgetQueryRequest implements RequestInterface
{
    /**
     * @param string      $widget_query_id Unique identifier for the query to be answered
     * @param string|null $data            Data to be returned to the widget, 0-1024 bytes
     */
    public function __construct(
        private string $widget_query_id,
        private ?string $data = null,
    ) {}

    public function getWidgetQueryId(): string
    {
        return $this->widget_query_id;
    }

    public function setWidgetQueryId(string $widget_query_id): AnswerWidgetQueryRequest
    {
        $this->widget_query_id = $widget_query_id;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): AnswerWidgetQueryRequest
    {
        $this->data = $data;

        return $this;
    }
}
// endregion CLASS_AnswerWidgetQueryRequest
