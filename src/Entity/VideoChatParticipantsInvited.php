<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about new members invited to a video chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#videochatparticipantsinvited
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: VideoChatParticipantsInvited, Telegram, Bot API, DTO, videochatparticipantsinvited
// STRUCTURE: ▶ ┌users: User[]┐ → ∑ invite
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
