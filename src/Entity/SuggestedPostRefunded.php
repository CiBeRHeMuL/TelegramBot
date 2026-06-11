<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\SuggestedPostRefundedReasonEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a refunded suggested post payment.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#suggestedpostrefunded
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SuggestedPostRefunded, Telegram, Bot API, DTO, suggestedpostrefunded
// STRUCTURE: ▶ ┌...┐ → ∑ refund
// region CLASS_SuggestedPostRefunded

/**
 * Describes a service message about a payment refund for a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostrefunded
 */
final class SuggestedPostRefunded implements EntityInterface
{
    /**
     * @param SuggestedPostRefundedReasonEnum $reason                 Reason for the refund. Currently, one of “post_deleted” if the post was
     *                                                                deleted within 24 hours of being posted or removed from scheduled messages without being posted, or “payment_refunded”
     *                                                                if the payer refunded their payment.
     * @param Message|null                    $suggested_post_message Optional. Message containing the suggested post. Note that the Message object
     *                                                                in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        protected SuggestedPostRefundedReasonEnum $reason,
        protected ?Message $suggested_post_message = null,
    ) {}

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
    public function getSuggestedPostMessage(): ?Message
    {
        return $this->suggested_post_message;
    }

    /**
     * @param Message|null $suggested_post_message
     *
     * @return SuggestedPostRefunded
     */
    public function setSuggestedPostMessage(?Message $suggested_post_message): SuggestedPostRefunded
    {
        $this->suggested_post_message = $suggested_post_message;

        return $this;
    }
}

// endregion CLASS_SuggestedPostRefunded
