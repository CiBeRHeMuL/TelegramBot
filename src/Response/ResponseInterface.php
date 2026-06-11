<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ResponseParameters;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Interface defining the contract for all Telegram Bot API response DTOs.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: interface, contract, response, Telegram Bot API
// STRUCTURE: ▶ ○ isOk() + getDescription() + getRawResult() + getErrorCode() + getParameters()

// region CLASS_ResponseInterface [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
interface ResponseInterface
{
    public function isOk(): bool;

    public function getDescription(): ?string;

    public function getRawResult(): ?array;

    public function getErrorCode(): ?HttpStatusCodeEnum;

    public function getParameters(): ?ResponseParameters;
}

// endregion CLASS_ResponseInterface
