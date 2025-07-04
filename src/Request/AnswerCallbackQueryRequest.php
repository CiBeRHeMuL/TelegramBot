<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Url;

class AnswerCallbackQueryRequest implements RequestInterface
{
    /**
     * @param string $callback_query_id Unique identifier for the query to be answered
     * @param int|null $cache_time The maximum amount of time in seconds that the result of the callback query may be cached client-side.
     * Telegram apps will support caching starting in version 3.14. Defaults to 0.
     * @param bool|null $show_alert If True, an alert will be shown by the client instead of a notification at the top of the chat
     * screen. Defaults to false.
     * @param string|null $text Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
     * @param Url|null $url URL that will be opened by the user's client. If you have created a Game and accepted the conditions
     * via \@BotFather, specify the URL that opens your game - note that this will only work if the query comes from a callback_game
     * button.Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
     */
    public function __construct(
        private string $callback_query_id,
        private int|null $cache_time = null,
        private bool|null $show_alert = null,
        private string|null $text = null,
        private Url|null $url = null,
    ) {
    }

    public function getCallbackQueryId(): string
    {
        return $this->callback_query_id;
    }

    public function setCallbackQueryId(string $callback_query_id): AnswerCallbackQueryRequest
    {
        $this->callback_query_id = $callback_query_id;
        return $this;
    }

    public function getCacheTime(): int|null
    {
        return $this->cache_time;
    }

    public function setCacheTime(int|null $cache_time): AnswerCallbackQueryRequest
    {
        $this->cache_time = $cache_time;
        return $this;
    }

    public function getShowAlert(): bool|null
    {
        return $this->show_alert;
    }

    public function setShowAlert(bool|null $show_alert): AnswerCallbackQueryRequest
    {
        $this->show_alert = $show_alert;
        return $this;
    }

    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(string|null $text): AnswerCallbackQueryRequest
    {
        $this->text = $text;
        return $this;
    }

    public function getUrl(): Url|null
    {
        return $this->url;
    }

    public function setUrl(Url|null $url): AnswerCallbackQueryRequest
    {
        $this->url = $url;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'callback_query_id' => $this->callback_query_id,
            'cache_time' => $this->cache_time,
            'show_alert' => $this->show_alert,
            'text' => $this->text,
            'url' => $this->url?->getUrl(),
        ];
    }
}
