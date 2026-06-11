<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\SuggestedPostInfoStateEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about a suggested channel post.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#suggestedpostinfo
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SuggestedPostInfo, Telegram, Bot API, DTO, suggestedpostinfo
// STRUCTURE: ▶ ┌message_thread_id,post_id┐ → ◇ ... → ∑ SuggestedPostInfo
// region CLASS_SuggestedPostInfo

/**
 * Contains information about a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostinfo
 */
final class SuggestedPostInfo implements EntityInterface
{
    /**
     * @param SuggestedPostInfoStateEnum $state     State of the suggested post. Currently, it can be one of “pending”, “approved”,
     *                                              “declined”.
     * @param SuggestedPostPrice|null    $price     Optional. Proposed price of the post. If the field is omitted, then the post is unpaid.
     * @param int|null                   $send_date Optional. Proposed send date of the post. If the field is omitted, then the post can be published
     *                                              at any time within 30 days at the sole discretion of the user or administrator who approves it.
     *
     * @see https://core.telegram.org/bots/api#suggestedpostprice SuggestedPostPrice
     */
    public function __construct(
        protected SuggestedPostInfoStateEnum $state,
        protected ?SuggestedPostPrice $price = null,
        protected ?int $send_date = null,
    ) {}

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
    public function getPrice(): ?SuggestedPostPrice
    {
        return $this->price;
    }

    /**
     * @param SuggestedPostPrice|null $price
     *
     * @return SuggestedPostInfo
     */
    public function setPrice(?SuggestedPostPrice $price): SuggestedPostInfo
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSendDate(): ?int
    {
        return $this->send_date;
    }

    /**
     * @param int|null $send_date
     *
     * @return SuggestedPostInfo
     */
    public function setSendDate(?int $send_date): SuggestedPostInfo
    {
        $this->send_date = $send_date;

        return $this;
    }
}

// endregion CLASS_SuggestedPostInfo
