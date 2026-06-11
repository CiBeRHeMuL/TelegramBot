<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatInviteLink;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API editChatSubscriptionInviteLink method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: edit chat subscription invite link, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ ChatInviteLink

// region CLASS_EditChatSubscriptionInviteLinkResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class EditChatSubscriptionInviteLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?ChatInviteLink $chatInviteLink = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatInviteLink(): ?ChatInviteLink
    {
        return $this->chatInviteLink;
    }
}

// endregion CLASS_EditChatSubscriptionInviteLinkResponse
