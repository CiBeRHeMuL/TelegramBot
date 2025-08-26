<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a service message about the failed approval of a suggested post. Currently, only caused by insufficient user funds
 * at the time of approval.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostapprovalfailed
 */
final class SuggestedPostApprovalFailed implements EntityInterface
{
    /**
     * @param SuggestedPostPrice $price Expected price of the post
     * @param Message|null $suggested_post_message Optional. Message containing the suggested post whose approval has failed. Note
     * that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#suggestedpostprice SuggestedPostPrice
     */
    public function __construct(
        protected SuggestedPostPrice $price,
        protected Message|null $suggested_post_message = null,
    ) {
    }

    /**
     * @return SuggestedPostPrice
     */
    public function getPrice(): SuggestedPostPrice
    {
        return $this->price;
    }

    /**
     * @param SuggestedPostPrice $price
     *
     * @return SuggestedPostApprovalFailed
     */
    public function setPrice(SuggestedPostPrice $price): SuggestedPostApprovalFailed
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getSuggestedPostMessage(): Message|null
    {
        return $this->suggested_post_message;
    }

    /**
     * @param Message|null $suggested_post_message
     *
     * @return SuggestedPostApprovalFailed
     */
    public function setSuggestedPostMessage(Message|null $suggested_post_message): SuggestedPostApprovalFailed
    {
        $this->suggested_post_message = $suggested_post_message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'price' => $this->price->toArray(),
            'suggested_post_message' => $this->suggested_post_message?->toArray(),
        ];
    }
}
