<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents changes in the status of a chat member.
 * @link https://core.telegram.org/bots/api#chatmemberupdated
 */
class ChatMemberUpdated extends AbstractEntity
{
    /**
     * @param Chat $chat Chat the user belongs to
     * @param User $from Performer of the action, which resulted in the change
     * @param int $date Date the change was done in Unix time
     * @param AbstractChatMember $old_chat_member Previous information about the chat member
     * @param AbstractChatMember $new_chat_member New information about the chat member
     * @param ChatInviteLink|null $invite_link Optional. Chat invite link, which was used by the user to join the chat; for joining
     * by invite link events only.
     * @param bool|null $via_chat_folder_invite_link Optional. True, if the user joined the chat via a chat folder invite link
     * @param bool|null $via_join_request Optional. True, if the user joined the chat after sending a direct join request without
     * using an invite link and being approved by an administrator
     */
    public function __construct(
        protected Chat $chat,
        protected User $from,
        protected int $date,
        protected AbstractChatMember $old_chat_member,
        protected AbstractChatMember $new_chat_member,
        protected ChatInviteLink|null $invite_link = null,
        protected bool|null $via_chat_folder_invite_link = null,
        protected bool|null $via_join_request = null,
    ) {
        parent::__construct();
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): ChatMemberUpdated
    {
        $this->chat = $chat;
        return $this;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function setFrom(User $from): ChatMemberUpdated
    {
        $this->from = $from;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): ChatMemberUpdated
    {
        $this->date = $date;
        return $this;
    }

    public function getOldChatMember(): AbstractChatMember
    {
        return $this->old_chat_member;
    }

    public function setOldChatMember(AbstractChatMember $old_chat_member): ChatMemberUpdated
    {
        $this->old_chat_member = $old_chat_member;
        return $this;
    }

    public function getNewChatMember(): AbstractChatMember
    {
        return $this->new_chat_member;
    }

    public function setNewChatMember(AbstractChatMember $new_chat_member): ChatMemberUpdated
    {
        $this->new_chat_member = $new_chat_member;
        return $this;
    }

    public function getInviteLink(): ChatInviteLink|null
    {
        return $this->invite_link;
    }

    public function setInviteLink(ChatInviteLink|null $invite_link): ChatMemberUpdated
    {
        $this->invite_link = $invite_link;
        return $this;
    }

    public function getViaChatFolderInviteLink(): bool|null
    {
        return $this->via_chat_folder_invite_link;
    }

    public function setViaChatFolderInviteLink(bool|null $via_chat_folder_invite_link): ChatMemberUpdated
    {
        $this->via_chat_folder_invite_link = $via_chat_folder_invite_link;
        return $this;
    }

    public function getViaJoinRequest(): bool|null
    {
        return $this->via_join_request;
    }

    public function setViaJoinRequest(bool|null $via_join_request): ChatMemberUpdated
    {
        $this->via_join_request = $via_join_request;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'from' => $this->from->toArray(),
            'date' => $this->date,
            'old_chat_member' => $this->old_chat_member->toArray(),
            'new_chat_member' => $this->new_chat_member->toArray(),
            'invite_link' => $this->invite_link?->toArray(),
            'via_chat_folder_invite_link' => $this->via_chat_folder_invite_link,
            'via_join_request' => $this->via_join_request,
        ];
    }
}
