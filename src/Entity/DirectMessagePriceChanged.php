<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes a service message about a change in the price of direct messages sent to a channel chat.
 *
 * @link https://core.telegram.org/bots/api#directmessagepricechanged
 */
final class DirectMessagePriceChanged implements EntityInterface
{
    /**
     * @param bool $are_direct_messages_enabled True, if direct messages are enabled for the channel chat; false otherwise
     * @param int|null $direct_message_star_count Optional. The new number of Telegram Stars that must be paid by users for each
     * direct message sent to the channel. Does not apply to users who have been exempted by administrators. Defaults to 0.
     */
    public function __construct(
        protected bool $are_direct_messages_enabled,
        protected ?int $direct_message_star_count = null,
    ) {}

    /**
     * @return bool
     */
    public function getAreDirectMessagesEnabled(): bool
    {
        return $this->are_direct_messages_enabled;
    }

    /**
     * @param bool $are_direct_messages_enabled
     *
     * @return DirectMessagePriceChanged
     */
    public function setAreDirectMessagesEnabled(bool $are_direct_messages_enabled): DirectMessagePriceChanged
    {
        $this->are_direct_messages_enabled = $are_direct_messages_enabled;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDirectMessageStarCount(): ?int
    {
        return $this->direct_message_star_count;
    }

    /**
     * @param int|null $direct_message_star_count
     *
     * @return DirectMessagePriceChanged
     */
    public function setDirectMessageStarCount(?int $direct_message_star_count): DirectMessagePriceChanged
    {
        $this->direct_message_star_count = $direct_message_star_count;
        return $this;
    }
}
