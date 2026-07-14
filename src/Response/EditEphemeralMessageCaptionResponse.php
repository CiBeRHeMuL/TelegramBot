<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API editMessageCaption method for ephemeral messages.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: edit ephemeral message caption, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ Message|bool

// region CLASS_EditEphemeralMessageCaptionResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class EditEphemeralMessageCaptionResponse extends AbstractResponse
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
// endregion CLASS_EditEphemeralMessageCaptionResponse
