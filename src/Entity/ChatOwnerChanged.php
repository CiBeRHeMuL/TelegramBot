<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes a service message about an ownership change in the chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_owner_changed
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatOwnerChanged, Telegram, Bot API, DTO, chat_owner_changed
// STRUCTURE: ▶ ┌new_owner┐ → ∑ ChatOwnerChanged
// region CLASS_ChatOwnerChanged

/**
 * Describes a service message about an ownership change in the chat.
 *
 * @see https://core.telegram.org/bots/api#chatownerchanged
 */
final class ChatOwnerChanged implements EntityInterface
{
    /**
     * @param User $new_owner The new owner of the chat
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $new_owner,
    ) {}

    /**
     * @return User
     */
    public function getNewOwner(): User
    {
        return $this->new_owner;
    }

    /**
     * @param User $new_owner
     *
     * @return ChatOwnerChanged
     */
    public function setNewOwner(User $new_owner): ChatOwnerChanged
    {
        $this->new_owner = $new_owner;

        return $this;
    }
}
// endregion CLASS_ChatOwnerChanged
