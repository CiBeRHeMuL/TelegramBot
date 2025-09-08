<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ShippingOption;

/**
 * @link https://core.telegram.org/bots/api#answershippingquery
 */
class AnswerShippingQueryRequest implements RequestInterface
{
    /**
     * @param bool $ok Pass True if delivery to the specified address is possible and False if there are any problems (for example,
     * if delivery to the specified address is not possible)
     * @param string $shipping_query_id Unique identifier for the query to be answered
     * @param string|null $error_message Required if ok is False. Error message in human readable form that explains why it is impossible
     * to complete the order (e.g. “Sorry, delivery to your desired address is unavailable”). Telegram will display this message
     * to the user.
     * @param ShippingOption[]|null $shipping_options Required if ok is True. A JSON-serialized array of available shipping options.
     *
     * @see https://core.telegram.org/bots/api#shippingoption ShippingOption
     */
    public function __construct(
        private bool $ok,
        private string $shipping_query_id,
        private ?string $error_message = null,
        private ?array $shipping_options = null,
    ) {}

    public function getOk(): bool
    {
        return $this->ok;
    }

    public function setOk(bool $ok): AnswerShippingQueryRequest
    {
        $this->ok = $ok;
        return $this;
    }

    public function getShippingQueryId(): string
    {
        return $this->shipping_query_id;
    }

    public function setShippingQueryId(string $shipping_query_id): AnswerShippingQueryRequest
    {
        $this->shipping_query_id = $shipping_query_id;
        return $this;
    }

    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }

    public function setErrorMessage(?string $error_message): AnswerShippingQueryRequest
    {
        $this->error_message = $error_message;
        return $this;
    }

    public function getShippingOptions(): ?array
    {
        return $this->shipping_options;
    }

    public function setShippingOptions(?array $shipping_options): AnswerShippingQueryRequest
    {
        $this->shipping_options = $shipping_options;
        return $this;
    }
}
