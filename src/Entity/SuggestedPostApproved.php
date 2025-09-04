<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes a service message about the approval of a suggested post.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostapproved
 */
final class SuggestedPostApproved implements EntityInterface
{
    /**
     * @param int $send_date Date when the post will be published
     * @param SuggestedPostPrice|null $price Optional. Amount paid for the post
     * @param Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object
     * in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#suggestedpostprice SuggestedPostPrice
     */
    public function __construct(
        protected int $send_date,
        protected SuggestedPostPrice|null $price = null,
        protected Message|null $suggested_post_message = null,
    ) {
    }

    /**
     * @return int
     */
    public function getSendDate(): int
    {
        return $this->send_date;
    }

    /**
     * @param int $send_date
     *
     * @return SuggestedPostApproved
     */
    public function setSendDate(int $send_date): SuggestedPostApproved
    {
        $this->send_date = $send_date;
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
     * @return SuggestedPostApproved
     */
    public function setPrice(SuggestedPostPrice|null $price): SuggestedPostApproved
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
     * @return SuggestedPostApproved
     */
    public function setSuggestedPostMessage(Message|null $suggested_post_message): SuggestedPostApproved
    {
        $this->suggested_post_message = $suggested_post_message;
        return $this;
    }
}
