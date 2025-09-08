<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Contains parameters of a post that is being suggested by the bot.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostparameters
 */
final class SuggestedPostParameters implements EntityInterface
{
    /**
     * @param SuggestedPostPrice|null $price Optional. Proposed price for the post. If the field is omitted, then the post is unpaid.
     * @param int|null $send_date Optional. Proposed send date of the post. If specified, then the date must be between 300 second
     * and 2678400 seconds (30 days) in the future. If the field is omitted, then the post can be published at any time within 30
     * days at the sole discretion of the user who approves it.
     *
     * @see https://core.telegram.org/bots/api#suggestedpostprice SuggestedPostPrice
     */
    public function __construct(
        protected ?SuggestedPostPrice $price = null,
        protected ?int $send_date = null,
    ) {}

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
     * @return SuggestedPostParameters
     */
    public function setPrice(?SuggestedPostPrice $price): SuggestedPostParameters
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
     * @return SuggestedPostParameters
     */
    public function setSendDate(?int $send_date): SuggestedPostParameters
    {
        $this->send_date = $send_date;
        return $this;
    }
}
