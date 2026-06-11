<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a suggested channel post that was approved.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#suggestedpostapproved
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SuggestedPostApproved, Telegram, Bot API, DTO, suggestedpostapproved
// STRUCTURE: ▶ ┌post_id...┐ → ∑ SuggestedPostApproved
// region CLASS_SuggestedPostApproved

/**
 * Describes a service message about the approval of a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostapproved
 */
final class SuggestedPostApproved implements EntityInterface
{
    /**
     * @param int                     $send_date              Date when the post will be published
     * @param SuggestedPostPrice|null $price                  Optional. Amount paid for the post
     * @param Message|null            $suggested_post_message Optional. Message containing the suggested post. Note that the Message object
     *                                                        in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#suggestedpostprice SuggestedPostPrice
     */
    public function __construct(
        protected int $send_date,
        protected ?SuggestedPostPrice $price = null,
        protected ?Message $suggested_post_message = null,
    ) {}

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
    public function getPrice(): ?SuggestedPostPrice
    {
        return $this->price;
    }

    /**
     * @param SuggestedPostPrice|null $price
     *
     * @return SuggestedPostApproved
     */
    public function setPrice(?SuggestedPostPrice $price): SuggestedPostApproved
    {
        $this->price = $price;

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
     * @return SuggestedPostApproved
     */
    public function setSuggestedPostMessage(?Message $suggested_post_message): SuggestedPostApproved
    {
        $this->suggested_post_message = $suggested_post_message;

        return $this;
    }
}

// endregion CLASS_SuggestedPostApproved
