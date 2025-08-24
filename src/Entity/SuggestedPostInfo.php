<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\SuggestedPostInfoStateEnum;
use stdClass;

/**
 * Contains information about a suggested post.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostinfo
 */
class SuggestedPostInfo extends AbstractEntity
{
    /**
     * @param SuggestedPostInfoStateEnum $state State of the suggested post. Currently, it can be one of “pending”, “approved”, “declined”.
     * @param SuggestedPostPrice|null $price Optional. Proposed price of the post. If the field is omitted, then the post is unpaid.
     * @param int|null $send_date Optional. Proposed send date of the post. If the field is omitted, then the post can be published
     * at any time within 30 days at the sole discretion of the user or administrator who approves it.
     *
     * @see https://core.telegram.org/bots/api#suggestedpostprice SuggestedPostPrice
     */
    public function __construct(
        protected SuggestedPostInfoStateEnum $state,
        protected SuggestedPostPrice|null $price = null,
        protected int|null $send_date = null,
    ) {
        parent::__construct();
    }

    /**
     * @return SuggestedPostInfoStateEnum
     */
    public function getState(): SuggestedPostInfoStateEnum
    {
        return $this->state;
    }

    /**
     * @param SuggestedPostInfoStateEnum $state
     *
     * @return SuggestedPostInfo
     */
    public function setState(SuggestedPostInfoStateEnum $state): SuggestedPostInfo
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return SuggestedPostPrice|null
     */
    public function getPrice(): SuggestedPostPrice|null
    {
        return $this->price;
    }

    /**
     * @param SuggestedPostPrice|null $price
     *
     * @return SuggestedPostInfo
     */
    public function setPrice(SuggestedPostPrice|null $price): SuggestedPostInfo
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSendDate(): int|null
    {
        return $this->send_date;
    }

    /**
     * @param int|null $send_date
     *
     * @return SuggestedPostInfo
     */
    public function setSendDate(int|null $send_date): SuggestedPostInfo
    {
        $this->send_date = $send_date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'state' => $this->state->value,
            'price' => $this->price?->toArray(),
            'send_date' => $this->send_date,
        ];
    }
}
