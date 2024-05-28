<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use stdClass;

/**
 * This object represents a service message about new members invited to a video chat.
 * @link https://core.telegram.org/bots/api#videochatparticipantsinvited
 */
class VideoChatParticipantsInvited implements EntityInterface
{
    /**
     * @param User[] $users New members that were invited to the video chat
     */
    public function __construct(
        #[ArrayType(User::class)] private array $users
    ) {
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function setUsers(array $users): VideoChatParticipantsInvited
    {
        $this->users = $users;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'users' => array_map(
                fn(User $user) => $user->toArray(),
                $this->users,
            ),
        ];
    }
}
