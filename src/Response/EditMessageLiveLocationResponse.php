<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API editMessageLiveLocation method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: edit message live location, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ Message|bool

// region CLASS_EditMessageLiveLocationResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class EditMessageLiveLocationResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Message|bool|null $message = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessage(): bool|Message|null
    {
        return $this->message;
    }
}

// endregion CLASS_EditMessageLiveLocationResponse
