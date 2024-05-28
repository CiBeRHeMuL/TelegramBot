<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class CreateChatInviteLinkRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param bool|null $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators.
     * If True, member_limit can't be specified
     * @param int|null $expire_date Point in time (Unix timestamp) when the link will expire
     * @param int|null $member_limit The maximum number of users that can be members of the chat simultaneously after joining the
     * chat via this invite link; 1-99999
     * @param string|null $name Invite link name; 0-32 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private bool|null $creates_join_request = null,
        private int|null $expire_date = null,
        private int|null $member_limit = null,
        private string|null $name = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): CreateChatInviteLinkRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getCreatesJoinRequest(): bool|null
    {
        return $this->creates_join_request;
    }

    public function setCreatesJoinRequest(bool|null $creates_join_request): CreateChatInviteLinkRequest
    {
        $this->creates_join_request = $creates_join_request;
        return $this;
    }

    public function getExpireDate(): int|null
    {
        return $this->expire_date;
    }

    public function setExpireDate(int|null $expire_date): CreateChatInviteLinkRequest
    {
        $this->expire_date = $expire_date;
        return $this;
    }

    public function getMemberLimit(): int|null
    {
        return $this->member_limit;
    }

    public function setMemberLimit(int|null $member_limit): CreateChatInviteLinkRequest
    {
        $this->member_limit = $member_limit;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): CreateChatInviteLinkRequest
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'creates_join_request' => $this->creates_join_request,
            'expire_date' => $this->expire_date,
            'member_limit' => $this->member_limit,
            'name' => $this->name,
        ];
    }
}
