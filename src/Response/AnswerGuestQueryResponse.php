<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\SentGuestMessage;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API answerGuestQuery method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: answer guest query, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ SentGuestMessage

// region CLASS_AnswerGuestQueryResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class AnswerGuestQueryResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?SentGuestMessage $sentGuestMessage = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getSentGuestMessage(): ?SentGuestMessage
    {
        return $this->sentGuestMessage;
    }
}

// endregion CLASS_AnswerGuestQueryResponse
