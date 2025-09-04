<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents an invite link for a chat.
 *
 * @link https://core.telegram.org/bots/api#chatinvitelink
 */
final class ChatInviteLink implements EntityInterface
{
    /**
     * @param Url $invite_link The invite link. If the link was created by another chat administrator, then the second part of the
     * link will be replaced with “…”.
     * @param User $creator Creator of the link
     * @param bool $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators
     * @param bool $is_primary True, if the link is primary
     * @param bool $is_revoked True, if the link is revoked
     * @param int|null $expire_date Optional. Point in time (Unix timestamp) when the link will expire or has been expired
     * @param int|null $member_limit Optional. The maximum number of users that can be members of the chat simultaneously after joining
     * the chat via this invite link; 1-99999
     * @param string|null $name Optional. Invite link name
     * @param int|null $pending_join_request_count Optional. Number of pending join requests created using this link
     * @param int|null $subscription_period Optional. The number of seconds the subscription will be active for before the next payment
     * @param int|null $subscription_price Optional. The amount of Telegram Stars a user must pay initially and after each subsequent
     * subscription period to be a member of the chat using the link
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected Url $invite_link,
        protected User $creator,
        protected bool $creates_join_request,
        protected bool $is_primary,
        protected bool $is_revoked,
        protected int|null $expire_date = null,
        protected int|null $member_limit = null,
        protected string|null $name = null,
        protected int|null $pending_join_request_count = null,
        protected int|null $subscription_period = null,
        protected int|null $subscription_price = null,
    ) {
    }

    /**
     * @return Url
     */
    public function getInviteLink(): Url
    {
        return $this->invite_link;
    }

    /**
     * @param Url $invite_link
     *
     * @return ChatInviteLink
     */
    public function setInviteLink(Url $invite_link): ChatInviteLink
    {
        $this->invite_link = $invite_link;
        return $this;
    }

    /**
     * @return User
     */
    public function getCreator(): User
    {
        return $this->creator;
    }

    /**
     * @param User $creator
     *
     * @return ChatInviteLink
     */
    public function setCreator(User $creator): ChatInviteLink
    {
        $this->creator = $creator;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCreatesJoinRequest(): bool
    {
        return $this->creates_join_request;
    }

    /**
     * @param bool $creates_join_request
     *
     * @return ChatInviteLink
     */
    public function setCreatesJoinRequest(bool $creates_join_request): ChatInviteLink
    {
        $this->creates_join_request = $creates_join_request;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPrimary(): bool
    {
        return $this->is_primary;
    }

    /**
     * @param bool $is_primary
     *
     * @return ChatInviteLink
     */
    public function setIsPrimary(bool $is_primary): ChatInviteLink
    {
        $this->is_primary = $is_primary;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsRevoked(): bool
    {
        return $this->is_revoked;
    }

    /**
     * @param bool $is_revoked
     *
     * @return ChatInviteLink
     */
    public function setIsRevoked(bool $is_revoked): ChatInviteLink
    {
        $this->is_revoked = $is_revoked;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getExpireDate(): int|null
    {
        return $this->expire_date;
    }

    /**
     * @param int|null $expire_date
     *
     * @return ChatInviteLink
     */
    public function setExpireDate(int|null $expire_date): ChatInviteLink
    {
        $this->expire_date = $expire_date;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMemberLimit(): int|null
    {
        return $this->member_limit;
    }

    /**
     * @param int|null $member_limit
     *
     * @return ChatInviteLink
     */
    public function setMemberLimit(int|null $member_limit): ChatInviteLink
    {
        $this->member_limit = $member_limit;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return ChatInviteLink
     */
    public function setName(string|null $name): ChatInviteLink
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPendingJoinRequestCount(): int|null
    {
        return $this->pending_join_request_count;
    }

    /**
     * @param int|null $pending_join_request_count
     *
     * @return ChatInviteLink
     */
    public function setPendingJoinRequestCount(int|null $pending_join_request_count): ChatInviteLink
    {
        $this->pending_join_request_count = $pending_join_request_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubscriptionPeriod(): int|null
    {
        return $this->subscription_period;
    }

    /**
     * @param int|null $subscription_period
     *
     * @return ChatInviteLink
     */
    public function setSubscriptionPeriod(int|null $subscription_period): ChatInviteLink
    {
        $this->subscription_period = $subscription_period;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubscriptionPrice(): int|null
    {
        return $this->subscription_price;
    }

    /**
     * @param int|null $subscription_price
     *
     * @return ChatInviteLink
     */
    public function setSubscriptionPrice(int|null $subscription_price): ChatInviteLink
    {
        $this->subscription_price = $subscription_price;
        return $this;
    }
}
