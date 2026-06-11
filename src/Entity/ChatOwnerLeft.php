<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes a service message about the chat owner leaving the chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_owner_left
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatOwnerLeft, Telegram, Bot API, DTO, chat_owner_left
// STRUCTURE: ▶ ┌new_owner┐ → ∑ ChatOwnerLeft
// region CLASS_ChatOwnerLeft

/**
 * Describes a service message about the chat owner leaving the chat.
 *
 * @see https://core.telegram.org/bots/api#chatownerleft
 */
final class ChatOwnerLeft implements EntityInterface
{
    /**
     * @param User|null $new_owner Optional. The user who will become the new owner of the chat if the previous owner does not return
     *                             to the chat
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected ?User $new_owner = null,
    ) {}

    /**
     * @return User|null
     */
    public function getNewOwner(): ?User
    {
        return $this->new_owner;
    }

    /**
     * @param User|null $new_owner
     *
     * @return ChatOwnerLeft
     */
    public function setNewOwner(?User $new_owner): ChatOwnerLeft
    {
        $this->new_owner = $new_owner;

        return $this;
    }
}
// endregion CLASS_ChatOwnerLeft
