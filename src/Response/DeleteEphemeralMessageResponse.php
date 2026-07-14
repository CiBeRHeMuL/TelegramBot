<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API deleteMessage method for ephemeral messages.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: delete ephemeral message, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ bool

// region CLASS_DeleteEphemeralMessageResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class DeleteEphemeralMessageResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?bool $result = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getResult(): ?bool
    {
        return $this->result;
    }
}
// endregion CLASS_DeleteEphemeralMessageResponse
