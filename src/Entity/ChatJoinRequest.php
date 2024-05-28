<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\ChatId;
use stdClass;

/**
 * Represents a join request sent to a chat.
 * @link https://core.telegram.org/bots/api#chatjoinrequest
 */
class ChatJoinRequest extends AbstractEntity
{
    /**
     * @param Chat $chat Chat to which the request was sent
     * @param User $from User that sent the join request
     * @param ChatId $user_chat_id Identifier of a protected chat with the user who sent the join request. This number may have more than
     * 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most
     * 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot can
     * use this identifier for 5 minutes to send messages until the join request is processed, assuming no other administrator contacted
     * the user.
     * @param int $date Date the request was sent in Unix time
     * @param string|null $bio Optional. Bio of the user.
     * @param ChatInviteLink|null $invite_link Optional. Chat invite link that was used by the user to send the join request
     */
    public function __construct(
        protected Chat $chat,
        protected User $from,
        protected ChatId $user_chat_id,
        protected int $date,
        protected string|null $bio = null,
        protected ChatInviteLink|null $invite_link = null,
    ) {
        parent::__construct();
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): ChatJoinRequest
    {
        $this->chat = $chat;
        return $this;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function setFrom(User $from): ChatJoinRequest
    {
        $this->from = $from;
        return $this;
    }

    public function getUserChatId(): ChatId
    {
        return $this->user_chat_id;
    }

    public function setUserChatId(ChatId $user_chat_id): ChatJoinRequest
    {
        $this->user_chat_id = $user_chat_id;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): ChatJoinRequest
    {
        $this->date = $date;
        return $this;
    }

    public function getBio(): string|null
    {
        return $this->bio;
    }

    public function setBio(string|null $bio): ChatJoinRequest
    {
        $this->bio = $bio;
        return $this;
    }

    public function getInviteLink(): ChatInviteLink|null
    {
        return $this->invite_link;
    }

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
