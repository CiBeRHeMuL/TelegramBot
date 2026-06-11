<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotAccessSettings;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getManagedBotAccessSettings method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get managed bot access settings, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ BotAccessSettings

// region CLASS_GetManagedBotAccessSettingsResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetManagedBotAccessSettingsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BotAccessSettings $botAccessSettings = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getBotAccessSettings(): ?BotAccessSettings
    {
        return $this->botAccessSettings;
    }
}

// endregion CLASS_GetManagedBotAccessSettingsResponse
