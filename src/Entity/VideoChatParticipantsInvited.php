<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region CLASS_VideoChatParticipantsInvited
/**
 * This object represents a service message about new members invited to a video chat.
 *
 * @see https://core.telegram.org/bots/api#videochatparticipantsinvited
 */
final class VideoChatParticipantsInvited implements EntityInterface
{
    /**
     * @param User[] $users New members that were invited to the video chat
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        #[ArrayType(User::class)]
        protected array $users,
    ) {}

    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param User[] $users
     *
     * @return VideoChatParticipantsInvited
     */
    public function setUsers(array $users): VideoChatParticipantsInvited
    {
        $this->users = $users;

        return $this;
    }
}

// endregion CLASS_VideoChatParticipantsInvited
