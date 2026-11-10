<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\BotSubscriptionStateEnum;

// region CLASS_BotSubscriptionUpdated
/**
 * Represents changes in the bot's subscription.
 *
 * @see https://core.telegram.org/bots/api#botsubscriptionupdated
 */
final class BotSubscriptionUpdated implements EntityInterface
{
    /**
     * @param User                     $user            User that changed their subscription
     * @param string                   $invoice_payload Invoice payload
     * @param BotSubscriptionStateEnum $state           State of the subscription; must be one of "active", "canceled", "expired"
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
        protected string $invoice_payload,
        protected BotSubscriptionStateEnum $state,
    ) {}

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return BotSubscriptionUpdated
     */
    public function setUser(User $user): BotSubscriptionUpdated
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * @param string $invoice_payload
     *
     * @return BotSubscriptionUpdated
     */
    public function setInvoicePayload(string $invoice_payload): BotSubscriptionUpdated
    {
        $this->invoice_payload = $invoice_payload;

        return $this;
    }

    /**
     * @return BotSubscriptionStateEnum
     */
    public function getState(): BotSubscriptionStateEnum
    {
        return $this->state;
    }

    /**
     * @param BotSubscriptionStateEnum $state
     *
     * @return BotSubscriptionUpdated
     */
    public function setState(BotSubscriptionStateEnum $state): BotSubscriptionUpdated
    {
        $this->state = $state;

        return $this;
    }
}

// endregion CLASS_BotSubscriptionUpdated
