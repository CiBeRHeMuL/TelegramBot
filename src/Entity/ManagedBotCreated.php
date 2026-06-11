<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a managed bot created in the chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#managedbotcreated
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ManagedBotCreated, Telegram, Bot API, DTO, managedbotcreated
// STRUCTURE: ▶ ┌bot_user_id,bot_username┐ → ∑ ManagedBotCreated
// region CLASS_ManagedBotCreated

/**
 * This object contains information about the bot that was created to be managed by the current bot.
 *
 * @see https://core.telegram.org/bots/api#managedbotcreated
 */
final class ManagedBotCreated implements EntityInterface
{
    /**
     * @param User $bot Information about the bot. The bot's token can be fetched using the method getManagedBotToken.
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#getmanagedbottoken getManagedBotToken
     */
    public function __construct(
        protected User $bot,
    ) {}

    /**
     * @return User
     */
    public function getBot(): User
    {
        return $this->bot;
    }

    /**
     * @param User $bot
     *
     * @return ManagedBotCreated
     */
    public function setBot(User $bot): ManagedBotCreated
    {
        $this->bot = $bot;

        return $this;
    }
}

// endregion CLASS_ManagedBotCreated
