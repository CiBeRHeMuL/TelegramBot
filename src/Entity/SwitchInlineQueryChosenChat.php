<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default
 * inline query.
 *
 * @link https://core.telegram.org/bots/api#switchinlinequerychosenchat
 */
final class SwitchInlineQueryChosenChat implements EntityInterface
{
    /**
     * @param bool|null $allow_bot_chats Optional. True, if private chats with bots can be chosen
     * @param bool|null $allow_channel_chats Optional. True, if channel chats can be chosen
     * @param bool|null $allow_group_chats Optional. True, if group and supergroup chats can be chosen
     * @param bool|null $allow_user_chats Optional. True, if private chats with users can be chosen
     * @param string|null $query Optional. The default inline query to be inserted in the input field. If left empty, only the bot's
     * username will be inserted
     */
    public function __construct(
        protected bool|null $allow_bot_chats = null,
        protected bool|null $allow_channel_chats = null,
        protected bool|null $allow_group_chats = null,
        protected bool|null $allow_user_chats = null,
        protected string|null $query = null,
    ) {
    }

    /**
     * @return bool|null
     */
    public function getAllowBotChats(): bool|null
    {
        return $this->allow_bot_chats;
    }

    /**
     * @param bool|null $allow_bot_chats
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setAllowBotChats(bool|null $allow_bot_chats): SwitchInlineQueryChosenChat
    {
        $this->allow_bot_chats = $allow_bot_chats;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowChannelChats(): bool|null
    {
        return $this->allow_channel_chats;
    }

    /**
     * @param bool|null $allow_channel_chats
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setAllowChannelChats(bool|null $allow_channel_chats): SwitchInlineQueryChosenChat
    {
        $this->allow_channel_chats = $allow_channel_chats;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowGroupChats(): bool|null
    {
        return $this->allow_group_chats;
    }

    /**
     * @param bool|null $allow_group_chats
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setAllowGroupChats(bool|null $allow_group_chats): SwitchInlineQueryChosenChat
    {
        $this->allow_group_chats = $allow_group_chats;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowUserChats(): bool|null
    {
        return $this->allow_user_chats;
    }

    /**
     * @param bool|null $allow_user_chats
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setAllowUserChats(bool|null $allow_user_chats): SwitchInlineQueryChosenChat
    {
        $this->allow_user_chats = $allow_user_chats;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuery(): string|null
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setQuery(string|null $query): SwitchInlineQueryChosenChat
    {
        $this->query = $query;
        return $this;
    }
}
