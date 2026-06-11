<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API exportChatInviteLink method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: export chat invite link, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ Url

// region CLASS_ExportChatInviteLinkResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class ExportChatInviteLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ?Url $inviteLink = null,
    ) {
        parent::__construct($response);
    }

    public function getInviteLink(): ?Url
    {
        return $this->inviteLink;
    }
}

// endregion CLASS_ExportChatInviteLinkResponse
