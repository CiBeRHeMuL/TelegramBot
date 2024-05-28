<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

class ChatInviteLinkRequest implements EntityInterface
{
    /**
     * @param string $invite_link The invite link. If the link was created by another chat administrator, then the second part of
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
        private string $invite_link,
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

    public function toArray(): array|stdClass
    {
        return [
            'invite_link' => $this->invite_link,
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
