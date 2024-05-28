<?php

namespace AndrewGos\TelegramBot\Request;

class AnswerPreCheckoutQueryRequest implements RequestInterface
{
    /**
     * @param bool $ok Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed with the
     * order. Use False if there are any problems.
     * @param string $pre_checkout_query_id Unique identifier for the query to be answered
     * @param string|null $error_message Required if ok is False. Error message in human readable form that explains the reason for
     * failure to proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black T-shirts while you were
     * busy filling out your payment details. Please choose a different color or garment!"). Telegram will display this message to
     * the user.
     */
    public function __construct(
        private bool $ok,
        private string $pre_checkout_query_id,
        private string|null $error_message = null,
    ) {
    }

    public function getOk(): bool
    {
        return $this->ok;
    }

    public function setOk(bool $ok): AnswerPreCheckoutQueryRequest
    {
        $this->ok = $ok;
        return $this;
    }

    public function getPreCheckoutQueryId(): string
    {
        return $this->pre_checkout_query_id;
    }

    public function setPreCheckoutQueryId(string $pre_checkout_query_id): AnswerPreCheckoutQueryRequest
    {
        $this->pre_checkout_query_id = $pre_checkout_query_id;
        return $this;
    }

    public function getErrorMessage(): string|null
    {
        return $this->error_message;
    }

    public function setErrorMessage(string|null $error_message): AnswerPreCheckoutQueryRequest
    {
        $this->error_message = $error_message;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'ok' => $this->ok,
            'pre_checkout_query_id' => $this->pre_checkout_query_id,
            'error_message' => $this->error_message,
        ];
    }
}
