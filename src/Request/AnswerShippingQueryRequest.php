<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Entity\ShippingOption;

class AnswerShippingQueryRequest implements RequestInterface
{
    /**
     * @param bool $ok Pass True if delivery to the specified address is possible and False if there are any problems (for example,
     * if delivery to the specified address is not possible)
     * @param string $shipping_query_id Unique identifier for the query to be answered
     * @param string|null $error_message Required if ok is False. Error message in human readable form that explains why it is impossible
     * to complete the order (e.g. "Sorry, delivery to your desired address is unavailable'). Telegram will display this message
     * to the user.
     * @param ShippingOption[]|null $shipping_options Required if ok is True. A JSON-serialized array of available shipping options.
     */
    public function __construct(
        private bool $ok,
        private string $shipping_query_id,
        private string|null $error_message = null,
        #[ArrayType(ShippingOption::class)] private array|null $shipping_options = null,
    ) {
    }

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

    public function getErrorMessage(): string|null
    {
        return $this->error_message;
    }

    public function setErrorMessage(string|null $error_message): AnswerShippingQueryRequest
    {
        $this->error_message = $error_message;
        return $this;
    }

    public function getShippingOptions(): array|null
    {
        return $this->shipping_options;
    }

    public function setShippingOptions(array|null $shipping_options): AnswerShippingQueryRequest
    {
        $this->shipping_options = $shipping_options;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'ok' => $this->ok,
            'shipping_query_id' => $this->shipping_query_id,
            'error_message' => $this->error_message,
            'shipping_options' => $this->shipping_options
                ? array_map(fn(ShippingOption $e) => $e->toArray(), $this->shipping_options)
                : null,
        ];
    }
}
