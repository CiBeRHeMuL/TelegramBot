<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\SentWebAppMessage;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API answerWebAppQuery method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: answer web app query, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ SentWebAppMessage

// region CLASS_AnswerWebAppQueryResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class AnswerWebAppQueryResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?SentWebAppMessage $sentWebAppMessage = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getSentWebAppMessage(): ?SentWebAppMessage
    {
        return $this->sentWebAppMessage;
    }
}

// endregion CLASS_AnswerWebAppQueryResponse
