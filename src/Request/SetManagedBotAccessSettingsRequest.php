<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setManagedBotAccessSettings method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setmanagedbotaccesssettings
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Managed, Bot, Access, Settings
// STRUCTURE: ▶ ┌is_access_restricted + user_id + added_user_ids┐ → ◇ construct → ⊕ → ∑ ⟦SetManagedBotAccessSettingsRequest⟧

// region CLASS_SetManagedBotAccessSettingsRequest
/**
 * @see https://core.telegram.org/bots/api#setmanagedbotaccesssettings
 */
class SetManagedBotAccessSettingsRequest implements RequestInterface
{
    /**
     * @param bool       $is_access_restricted Pass True, if only selected users can access the bot. The bot's owner can always access
     *                                         it.
     * @param int        $user_id              User identifier of the managed bot whose access settings will be changed
     * @param int[]|null $added_user_ids       A JSON-serialized list of up to 10 identifiers of users who will have access to the bot
     *                                         in addition to its owner. Ignored if is_access_restricted is false.
     */
    public function __construct(
        private bool $is_access_restricted,
        private int $user_id,
        private ?array $added_user_ids = null,
    ) {}

    public function getIsAccessRestricted(): bool
    {
        return $this->is_access_restricted;
    }

    public function setIsAccessRestricted(bool $is_access_restricted): SetManagedBotAccessSettingsRequest
    {
        $this->is_access_restricted = $is_access_restricted;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SetManagedBotAccessSettingsRequest
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getAddedUserIds(): ?array
    {
        return $this->added_user_ids;
    }

    public function setAddedUserIds(?array $added_user_ids): SetManagedBotAccessSettingsRequest
    {
        $this->added_user_ids = $added_user_ids;

        return $this;
    }
}
// endregion CLASS_SetManagedBotAccessSettingsRequest
