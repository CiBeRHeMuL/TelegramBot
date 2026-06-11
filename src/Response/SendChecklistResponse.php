<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API sendChecklist method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: send checklist, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ Message

// region CLASS_SendChecklistResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class SendChecklistResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Message $message = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }
}

// endregion CLASS_SendChecklistResponse
