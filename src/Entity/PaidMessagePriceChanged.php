<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a service message about a change in the price of paid messages within a chat.
 *
 * @link https://core.telegram.org/bots/api#paidmessagepricechanged
 */
class PaidMessagePriceChanged extends AbstractEntity
{
    /**
     * @param int $paid_message_star_count The new number of Telegram Stars that must be paid by non-administrator users of the supergroup
     * chat for each sent message
     */
    public function __construct(
        protected int $paid_message_star_count,
    ) {
        parent::__construct();
    }

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

    public function toArray(): array|stdClass
    {
        return [
            'paid_message_star_count' => $this->paid_message_star_count,
        ];
    }
}
