<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Exception;

use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\Response\RawResponse;
use RuntimeException;
use stdClass;
use Throwable;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Исключение, выбрасываемое при не-2xx HTTP-ответе от Telegram Bot API.
 *
 * @sees USES_API(X): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ErrorResponseException, Telegram, exception, error, response, API
// STRUCTURE: ▶ ┌method, httpMethod, requestData, response┐ → ○ parent::__construct() → ∑ getters for all fields
// region CLASS_ErrorResponseException
class ErrorResponseException extends RuntimeException
{
    public function __construct(
        private readonly string $method,
        private readonly HttpMethodEnum $httpMethod,
        private readonly array|stdClass $requestData,
        private readonly RawResponse $response,
        string $message = '',
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
// endregion CLASS_ErrorResponseException
