<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

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
