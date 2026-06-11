<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getBusinessAccountStarBalance method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getbusinessaccountstarbalance
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, Business, Account, Star, Balance
// STRUCTURE: ▶ ┌business_connection_id┐ → ◇ construct → ⊕ → ∑ ⟦GetBusinessAccountStarBalanceRequest⟧

// region CLASS_GetBusinessAccountStarBalanceRequest
/**
 * @see https://core.telegram.org/bots/api#getbusinessaccountstarbalance
 */
class GetBusinessAccountStarBalanceRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     */
    public function __construct(
        private string $business_connection_id,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): GetBusinessAccountStarBalanceRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }
}
// endregion CLASS_GetBusinessAccountStarBalanceRequest
