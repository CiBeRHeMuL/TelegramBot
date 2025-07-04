<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Url;

class RevokeChatInviteLinkRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier of the target chat or username of the target channel (in the format \@channelusername)
     * @param Url $invite_link The invite link to revoke
     */
    public function __construct(
        private ChatId $chat_id,
        private Url $invite_link,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): RevokeChatInviteLinkRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getInviteLink(): Url
    {
        return $this->invite_link;
    }

    public function setInviteLink(Url $invite_link): RevokeChatInviteLinkRequest
    {
        $this->invite_link = $invite_link;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'invite_link' => $this->invite_link->getUrl(),
        ];
    }
}
