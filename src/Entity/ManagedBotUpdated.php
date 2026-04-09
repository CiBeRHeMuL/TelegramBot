<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object contains information about the creation, token update, or owner update of a bot that is managed by the current
 * bot.
 *
 * @link https://core.telegram.org/bots/api#managedbotupdated
 */
final class ManagedBotUpdated implements EntityInterface
{
    /**
     * @param User $user User that created the bot
     * @param User $bot Information about the bot. Token of the bot can be fetched using the method getManagedBotToken.
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#getmanagedbottoken getManagedBotToken
     */
    public function __construct(
        protected User $user,
        protected User $bot,
    ) {}

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return ManagedBotUpdated
     */
    public function setUser(User $user): ManagedBotUpdated
    {
        $this->user = $user;
        return $this;
    }

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
     * @return ManagedBotUpdated
     */
    public function setBot(User $bot): ManagedBotUpdated
    {
        $this->bot = $bot;
        return $this;
    }
}
