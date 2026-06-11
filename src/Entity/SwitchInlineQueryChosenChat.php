<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents an inline button that switches the current user to inline mode in a chosen chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#switchinlinequerychosenchat
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SwitchInlineQueryChosenChat, Telegram, Bot API, DTO, switchinlinequerychosenchat
// STRUCTURE: ▶ ◇ query,allow_user_chats,... → ∑ button
// region CLASS_SwitchInlineQueryChosenChat

/**
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default
 * inline query.
 *
 * @see https://core.telegram.org/bots/api#switchinlinequerychosenchat
 */
final class SwitchInlineQueryChosenChat implements EntityInterface
{
    /**
     * @param bool|null   $allow_bot_chats     Optional. True, if private chats with bots can be chosen
     * @param bool|null   $allow_channel_chats Optional. True, if channel chats can be chosen
     * @param bool|null   $allow_group_chats   Optional. True, if group and supergroup chats can be chosen
     * @param bool|null   $allow_user_chats    Optional. True, if private chats with users can be chosen
     * @param string|null $query               Optional. The default inline query to be inserted in the input field. If left empty, only the bot's
     *                                         username will be inserted
     */
    public function __construct(
        protected ?bool $allow_bot_chats = null,
        protected ?bool $allow_channel_chats = null,
        protected ?bool $allow_group_chats = null,
        protected ?bool $allow_user_chats = null,
        protected ?string $query = null,
    ) {}

    /**
     * @return bool|null
     */
    public function getAllowBotChats(): ?bool
    {
        return $this->allow_bot_chats;
    }

    /**
     * @param bool|null $allow_bot_chats
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setAllowBotChats(?bool $allow_bot_chats): SwitchInlineQueryChosenChat
    {
        $this->allow_bot_chats = $allow_bot_chats;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowChannelChats(): ?bool
    {
        return $this->allow_channel_chats;
    }

    /**
     * @param bool|null $allow_channel_chats
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setAllowChannelChats(?bool $allow_channel_chats): SwitchInlineQueryChosenChat
    {
        $this->allow_channel_chats = $allow_channel_chats;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowGroupChats(): ?bool
    {
        return $this->allow_group_chats;
    }

    /**
     * @param bool|null $allow_group_chats
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setAllowGroupChats(?bool $allow_group_chats): SwitchInlineQueryChosenChat
    {
        $this->allow_group_chats = $allow_group_chats;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowUserChats(): ?bool
    {
        return $this->allow_user_chats;
    }

    /**
     * @param bool|null $allow_user_chats
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setAllowUserChats(?bool $allow_user_chats): SwitchInlineQueryChosenChat
    {
        $this->allow_user_chats = $allow_user_chats;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     *
     * @return SwitchInlineQueryChosenChat
     */
    public function setQuery(?string $query): SwitchInlineQueryChosenChat
    {
        $this->query = $query;

        return $this;
    }
}

// endregion CLASS_SwitchInlineQueryChosenChat
