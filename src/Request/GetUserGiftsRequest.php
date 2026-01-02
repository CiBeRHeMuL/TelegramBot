<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#getusergifts
 */
class GetUserGiftsRequest implements RequestInterface
{
    /**
     * @param int $user_id Unique identifier of the user
     * @param bool|null $exclude_from_blockchain Pass True to exclude gifts that were assigned from the TON blockchain and can't
     * be resold or transferred in Telegram
     * @param bool|null $exclude_limited_non_upgradable Pass True to exclude gifts that can be purchased a limited number of times
     * and can't be upgraded to unique
     * @param bool|null $exclude_limited_upgradable Pass True to exclude gifts that can be purchased a limited number of times and
     * can be upgraded to unique
     * @param bool|null $exclude_unique Pass True to exclude unique gifts
     * @param bool|null $exclude_unlimited Pass True to exclude gifts that can be purchased an unlimited number of times
     * @param int|null $limit The maximum number of gifts to be returned; 1-100. Defaults to 100
     * @param string|null $offset Offset of the first entry to return as received from the previous request; use an empty string
     * to get the first chunk of results
     * @param bool|null $sort_by_price Pass True to sort results by gift price instead of send date. Sorting is applied before pagination.
     */
    public function __construct(
        private int $user_id,
        private ?bool $exclude_from_blockchain = null,
        private ?bool $exclude_limited_non_upgradable = null,
        private ?bool $exclude_limited_upgradable = null,
        private ?bool $exclude_unique = null,
        private ?bool $exclude_unlimited = null,
        private ?int $limit = null,
        private ?string $offset = null,
        private ?bool $sort_by_price = null,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetUserGiftsRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getExcludeFromBlockchain(): ?bool
    {
        return $this->exclude_from_blockchain;
    }

    public function setExcludeFromBlockchain(?bool $exclude_from_blockchain): GetUserGiftsRequest
    {
        $this->exclude_from_blockchain = $exclude_from_blockchain;
        return $this;
    }

    public function getExcludeLimitedNonUpgradable(): ?bool
    {
        return $this->exclude_limited_non_upgradable;
    }

    public function setExcludeLimitedNonUpgradable(?bool $exclude_limited_non_upgradable): GetUserGiftsRequest
    {
        $this->exclude_limited_non_upgradable = $exclude_limited_non_upgradable;
        return $this;
    }

    public function getExcludeLimitedUpgradable(): ?bool
    {
        return $this->exclude_limited_upgradable;
    }

    public function setExcludeLimitedUpgradable(?bool $exclude_limited_upgradable): GetUserGiftsRequest
    {
        $this->exclude_limited_upgradable = $exclude_limited_upgradable;
        return $this;
    }

    public function getExcludeUnique(): ?bool
    {
        return $this->exclude_unique;
    }

    public function setExcludeUnique(?bool $exclude_unique): GetUserGiftsRequest
    {
        $this->exclude_unique = $exclude_unique;
        return $this;
    }

    public function getExcludeUnlimited(): ?bool
    {
        return $this->exclude_unlimited;
    }

    public function setExcludeUnlimited(?bool $exclude_unlimited): GetUserGiftsRequest
    {
        $this->exclude_unlimited = $exclude_unlimited;
        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): GetUserGiftsRequest
    {
        $this->limit = $limit;
        return $this;
    }

    public function getOffset(): ?string
    {
        return $this->offset;
    }

    public function setOffset(?string $offset): GetUserGiftsRequest
    {
        $this->offset = $offset;
        return $this;
    }

    public function getSortByPrice(): ?bool
    {
        return $this->sort_by_price;
    }

    public function setSortByPrice(?bool $sort_by_price): GetUserGiftsRequest
    {
        $this->sort_by_price = $sort_by_price;
        return $this;
    }
}
