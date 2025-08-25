<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\SuggestedPostRefundedReasonEnum;
use stdClass;

/**
 * Describes a service message about a payment refund for a suggested post.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostrefunded
 */
class SuggestedPostRefunded extends AbstractEntity
{
    /**
     * @param SuggestedPostRefundedReasonEnum $reason Reason for the refund. Currently, one of “post_deleted” if the post was
     * deleted within 24 hours of being posted or removed from scheduled messages without being posted, or “payment_refunded”
     * if the payer refunded their payment.
     * @param Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object
     * in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        protected SuggestedPostRefundedReasonEnum $reason,
        protected Message|null $suggested_post_message = null,
    ) {
        parent::__construct();
    }

    /**
     * @return SuggestedPostRefundedReasonEnum
     */
    public function getReason(): SuggestedPostRefundedReasonEnum
    {
        return $this->reason;
    }

    /**
     * @param SuggestedPostRefundedReasonEnum $reason
     *
     * @return SuggestedPostRefunded
     */
    public function setReason(SuggestedPostRefundedReasonEnum $reason): SuggestedPostRefunded
    {
        $this->reason = $reason;
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
     * @return SuggestedPostRefunded
     */
    public function setSuggestedPostMessage(Message|null $suggested_post_message): SuggestedPostRefunded
    {
        $this->suggested_post_message = $suggested_post_message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'reason' => $this->reason->value,
            'suggested_post_message' => $this->suggested_post_message?->toArray(),
        ];
    }
}
