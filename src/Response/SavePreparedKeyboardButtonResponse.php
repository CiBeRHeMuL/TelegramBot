<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\PreparedKeyboardButton;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API savePreparedKeyboardButton method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: save prepared keyboard button, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ PreparedKeyboardButton

// region CLASS_SavePreparedKeyboardButtonResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class SavePreparedKeyboardButtonResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?PreparedKeyboardButton $preparedKeyboardButton = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getPreparedKeyboardButton(): ?PreparedKeyboardButton
    {
        return $this->preparedKeyboardButton;
    }
}

// endregion CLASS_SavePreparedKeyboardButtonResponse
