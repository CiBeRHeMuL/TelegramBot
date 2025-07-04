<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class CreateChatSubscriptionInviteLinkRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target channel chat or username of the target channel (in the format \@channelusername)
     * @param int $subscription_period The number of seconds the subscription will be active for before the next payment. Currently,
     * it must always be 2592000 (30 days).
     * @param int $subscription_price The amount of Telegram Stars a user must pay initially and after each subsequent subscription
     * period to be a member of the chat; 1-2500
     * @param string|null $name Invite link name; 0-32 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private int $subscription_period,
        private int $subscription_price,
        private string|null $name = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): CreateChatSubscriptionInviteLinkRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getSubscriptionPeriod(): int
    {
        return $this->subscription_period;
    }

    public function setSubscriptionPeriod(int $subscription_period): CreateChatSubscriptionInviteLinkRequest
    {
        $this->subscription_period = $subscription_period;
        return $this;
    }

    public function getSubscriptionPrice(): int
    {
        return $this->subscription_price;
    }

    public function setSubscriptionPrice(int $subscription_price): CreateChatSubscriptionInviteLinkRequest
    {
        $this->subscription_price = $subscription_price;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): CreateChatSubscriptionInviteLinkRequest
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'subscription_period' => $this->subscription_period,
            'subscription_price' => $this->subscription_price,
            'name' => $this->name,
        ];
    }
}
