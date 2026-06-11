<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API editChatSubscriptionInviteLink method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#editchatsubscriptioninvitelink
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Edit, Chat, Subscription, Invite, Link
// STRUCTURE: ▶ ┌chat_id + invite_link + name┐ → ◇ construct → ⊕ → ∑ ⟦EditChatSubscriptionInviteLinkRequest⟧

// region CLASS_EditChatSubscriptionInviteLinkRequest
/**
 * @see https://core.telegram.org/bots/api#editchatsubscriptioninvitelink
 */
class EditChatSubscriptionInviteLinkRequest implements RequestInterface
{
    /**
     * @param ChatId      $chat_id     Unique identifier for the target chat or username of the target channel in the format \@username
     * @param Url         $invite_link The invite link to edit
     * @param string|null $name        Invite link name; 0-32 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private Url $invite_link,
        private ?string $name = null,
    ) {}

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): EditChatSubscriptionInviteLinkRequest
    {
        $this->name = $name;

        return $this;
    }
}
// endregion CLASS_EditChatSubscriptionInviteLinkRequest
