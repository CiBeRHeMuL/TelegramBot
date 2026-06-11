<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getMyStarBalance method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getmystarbalance
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, My, Star, Balance
// STRUCTURE: ▶ ┌constructor┐ → ◇ build → ⊕ → ∑ ⟦GetMyStarBalanceRequest⟧

// region CLASS_GetMyStarBalanceRequest
class GetMyStarBalanceRequest implements RequestInterface
{
    public function __construct(
    ) {}
}
// endregion CLASS_GetMyStarBalanceRequest
