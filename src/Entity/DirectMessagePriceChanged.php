<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a service message about a change in the price of direct messages sent to a channel chat.
 *
 * @link https://core.telegram.org/bots/api#directmessagepricechanged
 */
class DirectMessagePriceChanged extends AbstractEntity
{
    /**
     * @param bool $are_direct_messages_enabled True, if direct messages are enabled for the channel chat; false otherwise
     * @param int|null $direct_message_star_count Optional. The new number of Telegram Stars that must be paid by users for each
     * direct message sent to the channel. Does not apply to users who have been exempted by administrators. Defaults to 0.
     */
    public function __construct(
        protected bool $are_direct_messages_enabled,
        protected int|null $direct_message_star_count = null,
    ) {
        parent::__construct();
    }

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
    public function getDirectMessageStarCount(): int|null
    {
        return $this->direct_message_star_count;
    }

    /**
     * @param int|null $direct_message_star_count
     *
     * @return DirectMessagePriceChanged
     */
    public function setDirectMessageStarCount(int|null $direct_message_star_count): DirectMessagePriceChanged
    {
        $this->direct_message_star_count = $direct_message_star_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'are_direct_messages_enabled' => $this->are_direct_messages_enabled,
            'direct_message_star_count' => $this->direct_message_star_count,
        ];
    }
}
