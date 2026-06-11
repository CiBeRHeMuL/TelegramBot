<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getChatMemberCount method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get chat member count, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result(int)┐ → ◇ isOk()? : ⊕ int

// region CLASS_GetChatMemberCountResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetChatMemberCountResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?int $count = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getCount(): ?int
    {
        return $this->count;
    }
}

// endregion CLASS_GetChatMemberCountResponse
