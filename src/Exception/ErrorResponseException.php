<?php

namespace AndrewGos\TelegramBot\Exception;

use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\Response\RawResponse;
use RuntimeException;
use stdClass;
use Throwable;

class ErrorResponseException extends RuntimeException
{
    public function __construct(
        private readonly string $method,
        private readonly HttpMethodEnum $httpMethod,
        private readonly array|stdClass $requestData,
        private readonly RawResponse $response,
        string $message = "",
        int $code = 0,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getHttpMethod(): HttpMethodEnum
    {
        return $this->httpMethod;
    }

    public function getRequestData(): array|stdClass
    {
        return $this->requestData;
    }

    public function getResponse(): RawResponse
    {
        return $this->response;
    }
}
