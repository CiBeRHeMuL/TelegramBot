<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getStarTransactions method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getstartransactions
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, Star, Transactions
// STRUCTURE: ▶ ┌limit + offset┐ → ◇ construct → ⊕ → ∑ ⟦GetStarTransactionsRequest⟧

// region CLASS_GetStarTransactionsRequest
/**
 * @see https://core.telegram.org/bots/api#getstartransactions
 */
class GetStarTransactionsRequest implements RequestInterface
{
    /**
     * @param int|null $limit  The maximum number of transactions to be retrieved. Values between 1-100 are accepted. Defaults to
     *                         100.
     * @param int|null $offset Number of transactions to skip in the response
     */
    public function __construct(
        private ?int $limit = null,
        private ?int $offset = null,
    ) {}

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): GetStarTransactionsRequest
    {
        $this->limit = $limit;

        return $this;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(?int $offset): GetStarTransactionsRequest
    {
        $this->offset = $offset;

        return $this;
    }
}
// endregion CLASS_GetStarTransactionsRequest
