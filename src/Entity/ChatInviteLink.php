<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Represents an invite link for a chat.
 * @link https://core.telegram.org/bots/api#chatinvitelink
 */
class ChatInviteLink implements EntityInterface
{
    /**
     * @param Url $invite_link The invite link. If the link was created by another chat administrator, then the second part of
     * the link will be replaced with “…”.
     * @param User $creator Creator of the link
     * @param bool $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators
     * @param bool $is_primary True, if the link is primary
     * @param bool $is_revoked True, if the link is revoked
     * @param int|null $expire_date Optional. Point in time (Unix timestamp) when the link will expire or has been expired
     * @param int|null $member_limit Optional. The maximum number of users that can be members of the chat simultaneously after joining
     * the chat via this invite link; 1-99999
     * @param string|null $name Optional. Invite link name
     * @param int|null $pending_join_request_count Optional. Number of pending join requests created using this link
     */
    public function __construct(
        private Url $invite_link,
        private User $creator,
        private bool $creates_join_request,
        private bool $is_primary,
        private bool $is_revoked,
        private int|null $expire_date = null,
        private int|null $member_limit = null,
        private string|null $name = null,
        private int|null $pending_join_request_count = null,
    ) {
    }

    public function getInviteLink(): Url
    {
        return $this->invite_link;
    }

    public function setInviteLink(Url $invite_link): ChatInviteLink
    {
        $this->invite_link = $invite_link;
        return $this;
    }

    public function getCreator(): User
    {
        return $this->creator;
    }

    public function setCreator(User $creator): ChatInviteLink
    {
        $this->creator = $creator;
        return $this;
    }

    public function isCreatesJoinRequest(): bool
    {
        return $this->creates_join_request;
    }

    public function setCreatesJoinRequest(bool $creates_join_request): ChatInviteLink
    {
        $this->creates_join_request = $creates_join_request;
        return $this;
    }

    public function isIsPrimary(): bool
    {
        return $this->is_primary;
    }

    public function setIsPrimary(bool $is_primary): ChatInviteLink
    {
        $this->is_primary = $is_primary;
        return $this;
    }

    public function isIsRevoked(): bool
    {
        return $this->is_revoked;
    }

    public function setIsRevoked(bool $is_revoked): ChatInviteLink
    {
        $this->is_revoked = $is_revoked;
        return $this;
    }

    public function getExpireDate(): int|null
    {
        return $this->expire_date;
    }

    public function setExpireDate(int|null $expire_date): ChatInviteLink
    {
        $this->expire_date = $expire_date;
        return $this;
    }

    public function getMemberLimit(): int|null
    {
        return $this->member_limit;
    }

    public function setMemberLimit(int|null $member_limit): ChatInviteLink
    {
        $this->member_limit = $member_limit;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): ChatInviteLink
    {
        $this->name = $name;
        return $this;
    }

    public function getPendingJoinRequestCount(): int|null
    {
        return $this->pending_join_request_count;
    }

    public function setPendingJoinRequestCount(int|null $pending_join_request_count): ChatInviteLink
    {
        $this->pending_join_request_count = $pending_join_request_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'invite_link' => $this->invite_link->getUrl(),
            'creator' => $this->creator->toArray(),
            'creates_join_request' => $this->creates_join_request,
            'is_primary' => $this->is_primary,
            'is_revoked' => $this->is_revoked,
            'expire_date' => $this->expire_date,
            'member_limit' => $this->member_limit,
            'name' => $this->name,
            'pending_join_request_count' => $this->pending_join_request_count,
        ];
    }
}
