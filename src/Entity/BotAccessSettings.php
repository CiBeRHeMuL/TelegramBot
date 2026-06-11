<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the access settings of a bot.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_access_settings
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotAccessSettings, Telegram, Bot API, DTO, bot_access_settings
// STRUCTURE: ▶ ┌is_access_restricted┐ → ∑ BotAccessSettings
// region CLASS_BotAccessSettings

/**
 * This object describes the access settings of a bot.
 *
 * @see https://core.telegram.org/bots/api#botaccesssettings
 */
final class BotAccessSettings implements EntityInterface
{
    /**
     * @param bool        $is_access_restricted True, if only selected users can access the bot. The bot's owner can always access it.
     * @param User[]|null $added_users          Optional. The list of other users who have access to the bot if the access is restricted
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected bool $is_access_restricted,
        #[ArrayType(User::class)]
        protected ?array $added_users = null,
    ) {}

    /**
     * @return bool
     */
    public function getIsAccessRestricted(): bool
    {
        return $this->is_access_restricted;
    }

    /**
     * @param bool $is_access_restricted
     *
     * @return BotAccessSettings
     */
    public function setIsAccessRestricted(bool $is_access_restricted): BotAccessSettings
    {
        $this->is_access_restricted = $is_access_restricted;

        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getAddedUsers(): ?array
    {
        return $this->added_users;
    }

    /**
     * @param User[]|null $added_users
     *
     * @return BotAccessSettings
     */
    public function setAddedUsers(?array $added_users): BotAccessSettings
    {
        $this->added_users = $added_users;

        return $this;
    }
}
// endregion CLASS_BotAccessSettings
