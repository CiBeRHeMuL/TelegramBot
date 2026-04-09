<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object contains information about the bot that was created to be managed by the current bot.
 *
 * @link https://core.telegram.org/bots/api#managedbotcreated
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
