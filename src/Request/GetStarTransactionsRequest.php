<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#getstartransactions
 */
class GetStarTransactionsRequest implements RequestInterface
{
    /**
     * @param int|null $limit The maximum number of transactions to be retrieved. Values between 1-100 are accepted. Defaults to
     * 100.
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
