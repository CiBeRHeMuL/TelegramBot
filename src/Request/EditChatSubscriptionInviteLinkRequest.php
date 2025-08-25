<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * @link https://core.telegram.org/bots/api#editchatsubscriptioninvitelink
 */
class EditChatSubscriptionInviteLinkRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param Url $invite_link The invite link to edit
     * @param string|null $name Invite link name; 0-32 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private Url $invite_link,
        private string|null $name = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): EditChatSubscriptionInviteLinkRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getInviteLink(): Url
    {
        return $this->invite_link;
    }

    public function setInviteLink(Url $invite_link): EditChatSubscriptionInviteLinkRequest
    {
        $this->invite_link = $invite_link;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): EditChatSubscriptionInviteLinkRequest
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'invite_link' => $this->invite_link->getUrl(),
            'name' => $this->name,
        ];
    }
}
