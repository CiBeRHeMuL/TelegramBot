<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ResponseParameters;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Base class for all typed Telegram Bot API response DTOs. Wraps RawResponse and provides common accessors for ok/description/error_code/parameters.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: abstract, base, response, Telegram Bot API
// STRUCTURE: ▶ ┌RawResponse┐ → ○ AbstractResponse → ⊕ isOk()/getDescription()/getErrorCode()/getParameters()

// region CLASS_AbstractResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
abstract class AbstractResponse implements ResponseInterface
{
    public function __construct(
        protected readonly RawResponse $response,
    ) {}

    public function isOk(): bool
    {
        return $this->response->isOk();
    }

    public function getDescription(): ?string
    {
        return $this->response->getDescription();
    }

    public function getRawResult(): ?array
    {
        return $this->response->getResult();
    }

    public function getErrorCode(): ?HttpStatusCodeEnum
    {
        return $this->response->getErrorCode();
    }

    public function getParameters(): ?ResponseParameters
    {
        return $this->response->getParameters();
    }
}

// endregion CLASS_AbstractResponse
