<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API sendDocument method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: send document, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ Message

// region CLASS_SendDocumentResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class SendDocumentResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ?Message $message = null,
    ) {
        parent::__construct($response);
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }
}

// endregion CLASS_SendDocumentResponse
