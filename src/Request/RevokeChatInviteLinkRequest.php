<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API revokeChatInviteLink method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#revokechatinvitelink
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Revoke, Chat, Invite, Link
// STRUCTURE: ▶ ┌chat_id + invite_link┐ → ◇ construct → ⊕ → ∑ ⟦RevokeChatInviteLinkRequest⟧

// region CLASS_RevokeChatInviteLinkRequest
/**
 * @see https://core.telegram.org/bots/api#revokechatinvitelink
 */
class RevokeChatInviteLinkRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id     Unique identifier of the target chat or username of the target channel in the format \@username
     * @param Url    $invite_link The invite link to revoke
     */
    public function __construct(
        private ChatId $chat_id,
        private Url $invite_link,
    ) {}

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
}
// endregion CLASS_RevokeChatInviteLinkRequest
