<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatInviteLink;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API revokeChatInviteLink method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: revoke chat invite link, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ ChatInviteLink

// region CLASS_RevokeChatInviteLinkResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class RevokeChatInviteLinkResponse extends AbstractResponse
{
    /**
     * @param RawResponse         $rawResponse
     * @param ChatInviteLink|null $chatInviteLink
     */
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

// endregion CLASS_RevokeChatInviteLinkResponse
