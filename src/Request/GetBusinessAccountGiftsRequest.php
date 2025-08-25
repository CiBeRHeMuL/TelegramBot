<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#getbusinessaccountgifts
 */
class GetBusinessAccountGiftsRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param bool|null $exclude_limited Pass True to exclude gifts that can be purchased a limited number of times
     * @param bool|null $exclude_saved Pass True to exclude gifts that are saved to the account's profile page
     * @param bool|null $exclude_unique Pass True to exclude unique gifts
     * @param bool|null $exclude_unlimited Pass True to exclude gifts that can be purchased an unlimited number of times
     * @param bool|null $exclude_unsaved Pass True to exclude gifts that aren't saved to the account's profile page
     * @param int|null $limit The maximum number of gifts to be returned; 1-100. Defaults to 100
     * @param string|null $offset Offset of the first entry to return as received from the previous request; use empty string to
     * get the first chunk of results
     * @param bool|null $sort_by_price Pass True to sort results by gift price instead of send date. Sorting is applied before pagination.
     */
    public function __construct(
        private string $business_connection_id,
        private bool|null $exclude_limited = null,
        private bool|null $exclude_saved = null,
        private bool|null $exclude_unique = null,
        private bool|null $exclude_unlimited = null,
        private bool|null $exclude_unsaved = null,
        private int|null $limit = null,
        private string|null $offset = null,
        private bool|null $sort_by_price = null,
    ) {
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): GetBusinessAccountGiftsRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getExcludeLimited(): bool|null
    {
        return $this->exclude_limited;
    }

    public function setExcludeLimited(bool|null $exclude_limited): GetBusinessAccountGiftsRequest
    {
        $this->exclude_limited = $exclude_limited;
        return $this;
    }

    public function getExcludeSaved(): bool|null
    {
        return $this->exclude_saved;
    }

    public function setExcludeSaved(bool|null $exclude_saved): GetBusinessAccountGiftsRequest
    {
        $this->exclude_saved = $exclude_saved;
        return $this;
    }

    public function getExcludeUnique(): bool|null
    {
        return $this->exclude_unique;
    }

    public function setExcludeUnique(bool|null $exclude_unique): GetBusinessAccountGiftsRequest
    {
        $this->exclude_unique = $exclude_unique;
        return $this;
    }

    public function getExcludeUnlimited(): bool|null
    {
        return $this->exclude_unlimited;
    }

    public function setExcludeUnlimited(bool|null $exclude_unlimited): GetBusinessAccountGiftsRequest
    {
        $this->exclude_unlimited = $exclude_unlimited;
        return $this;
    }

    public function getExcludeUnsaved(): bool|null
    {
        return $this->exclude_unsaved;
    }

    public function setExcludeUnsaved(bool|null $exclude_unsaved): GetBusinessAccountGiftsRequest
    {
        $this->exclude_unsaved = $exclude_unsaved;
        return $this;
    }

    public function getLimit(): int|null
    {
        return $this->limit;
    }

    public function setLimit(int|null $limit): GetBusinessAccountGiftsRequest
    {
        $this->limit = $limit;
        return $this;
    }

    public function getOffset(): string|null
    {
        return $this->offset;
    }

    public function setOffset(string|null $offset): GetBusinessAccountGiftsRequest
    {
        $this->offset = $offset;
        return $this;
    }

    public function getSortByPrice(): bool|null
    {
        return $this->sort_by_price;
    }

    public function setSortByPrice(bool|null $sort_by_price): GetBusinessAccountGiftsRequest
    {
        $this->sort_by_price = $sort_by_price;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'business_connection_id' => $this->business_connection_id,
            'exclude_limited' => $this->exclude_limited,
            'exclude_saved' => $this->exclude_saved,
            'exclude_unique' => $this->exclude_unique,
            'exclude_unlimited' => $this->exclude_unlimited,
            'exclude_unsaved' => $this->exclude_unsaved,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'sort_by_price' => $this->sort_by_price,
        ];
    }
}
