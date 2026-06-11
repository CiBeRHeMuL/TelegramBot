<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\AbstractChatMember;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getChatMember method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get chat member, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ AbstractChatMember

// region CLASS_GetChatMemberResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetChatMemberResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?AbstractChatMember $chatMember = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatMember(): ?AbstractChatMember
    {
        return $this->chatMember;
    }
}

// endregion CLASS_GetChatMemberResponse
