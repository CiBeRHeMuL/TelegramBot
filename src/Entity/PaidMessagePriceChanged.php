<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a change in the price of paid messages.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#paidmessagepricechanged
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PaidMessagePriceChanged, Telegram, Bot API, DTO, paidmessagepricechanged
// STRUCTURE: ▶ ┌from,star_count...┐ → ∑ PaidMessagePriceChanged
// region CLASS_PaidMessagePriceChanged

/**
 * Describes a service message about a change in the price of paid messages within a chat.
 *
 * @see https://core.telegram.org/bots/api#paidmessagepricechanged
 */
final class PaidMessagePriceChanged implements EntityInterface
{
    /**
     * @param int $paid_message_star_count The new number of Telegram Stars that must be paid by non-administrator users of the supergroup
     *                                     chat for each sent message
     */
    public function __construct(
        protected int $paid_message_star_count,
    ) {}

    /**
     * @return int
     */
    public function getPaidMessageStarCount(): int
    {
        return $this->paid_message_star_count;
    }

    /**
     * @param int $paid_message_star_count
     *
     * @return PaidMessagePriceChanged
     */
    public function setPaidMessageStarCount(int $paid_message_star_count): PaidMessagePriceChanged
    {
        $this->paid_message_star_count = $paid_message_star_count;

        return $this;
    }
}

// endregion CLASS_PaidMessagePriceChanged
