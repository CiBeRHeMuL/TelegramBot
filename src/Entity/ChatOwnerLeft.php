<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes a service message about the chat owner leaving the chat.
 *
 * @link https://core.telegram.org/bots/api#chatownerleft
 */
final class ChatOwnerLeft implements EntityInterface
{
    /**
     * @param User|null $new_owner Optional. The user which will be the new owner of the chat if the previous owner does not return
     * to the chat
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
