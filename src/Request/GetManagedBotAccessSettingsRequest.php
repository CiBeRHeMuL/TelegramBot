<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getManagedBotAccessSettings method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getmanagedbotaccesssettings
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, Managed, Bot, Access, Settings
// STRUCTURE: ▶ ┌user_id┐ → ◇ construct → ⊕ → ∑ ⟦GetManagedBotAccessSettingsRequest⟧

// region CLASS_GetManagedBotAccessSettingsRequest
/**
 * @see https://core.telegram.org/bots/api#getmanagedbotaccesssettings
 */
class GetManagedBotAccessSettingsRequest implements RequestInterface
{
    /**
     * @param int $user_id User identifier of the managed bot whose access settings will be returned
     */
    public function __construct(
        private int $user_id,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetManagedBotAccessSettingsRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_GetManagedBotAccessSettingsRequest
