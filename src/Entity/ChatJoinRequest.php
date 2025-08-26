<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Represents a join request sent to a chat.
 *
 * @link https://core.telegram.org/bots/api#chatjoinrequest
 */
final class ChatJoinRequest implements EntityInterface
{
    /**
     * @param Chat $chat Chat to which the request was sent
     * @param User $from User that sent the join request
     * @param int $user_chat_id Identifier of a private chat with the user who sent the join request. This number may have more than
     * 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most
     * 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot can
     * use this identifier for 5 minutes to send messages until the join request is processed, assuming no other administrator contacted
     * the user.
     * @param int $date Date the request was sent in Unix time
     * @param string|null $bio Optional. Bio of the user.
     * @param ChatInviteLink|null $invite_link Optional. Chat invite link that was used by the user to send the join request
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#chatinvitelink ChatInviteLink
     */
    public function __construct(
        protected Chat $chat,
        protected User $from,
        protected int $user_chat_id,
        protected int $date,
        protected string|null $bio = null,
        protected ChatInviteLink|null $invite_link = null,
    ) {
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     *
     * @return ChatJoinRequest
     */
    public function setChat(Chat $chat): ChatJoinRequest
    {
        $this->chat = $chat;
        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     *
     * @return ChatJoinRequest
     */
    public function setFrom(User $from): ChatJoinRequest
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserChatId(): int
    {
        return $this->user_chat_id;
    }

    /**
     * @param int $user_chat_id
     *
     * @return ChatJoinRequest
     */
    public function setUserChatId(int $user_chat_id): ChatJoinRequest
    {
        $this->user_chat_id = $user_chat_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return ChatJoinRequest
     */
    public function setDate(int $date): ChatJoinRequest
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBio(): string|null
    {
        return $this->bio;
    }

    /**
     * @param string|null $bio
     *
     * @return ChatJoinRequest
     */
    public function setBio(string|null $bio): ChatJoinRequest
    {
        $this->bio = $bio;
        return $this;
    }

    /**
     * @return ChatInviteLink|null
     */
    public function getInviteLink(): ChatInviteLink|null
    {
        return $this->invite_link;
    }

    /**
     * @param ChatInviteLink|null $invite_link
     *
     * @return ChatJoinRequest
     */
    public function setInviteLink(ChatInviteLink|null $invite_link): ChatJoinRequest
    {
        $this->invite_link = $invite_link;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'from' => $this->from->toArray(),
            'user_chat_id' => $this->user_chat_id,
            'date' => $this->date,
            'bio' => $this->bio,
            'invite_link' => $this->invite_link?->toArray(),
        ];
    }
}
