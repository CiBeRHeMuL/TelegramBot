<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use AndrewGos\TelegramBot\Enum\TransactionTypeEnum;
use stdClass;

/**
 * Describes a transaction with a user.
 * @link https://core.telegram.org/bots/api#transactionpartneruser
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::User->value))]
class TransactionPartnerUser extends AbstractTransactionPartner
{
    /**
     * @param User $user Information about the user
     * @param string|null $invoice_payload Optional. Bot-specified invoice payload
     * @param AbstractPaidMedia[]|null $paid_media Optional. Information about the paid media bought by the user
     * @param string|null $paid_media_payload Optional. Bot-specified paid media payload
     * @param int|null $subscription_period Optional. The duration of the paid subscription
     * @param Gift|null $gift Optional. The gift sent to the user by the bot
     * @param AffiliateInfo|null $affiliate Optional. Information about the affiliate that received a commission via this transaction
     * @param int|null $premium_subscription_duration Optional. Number of months the gifted Telegram Premium subscription will be active for;
     * for “premium_purchase” transactions only
     */
    public function __construct(
        protected User $user,
        protected TransactionTypeEnum $transaction_type,
        protected string|null $invoice_payload = null,
        #[ArrayType(AbstractPaidMedia::class)] protected array|null $paid_media = null,
        protected string|null $paid_media_payload = null,
        protected int|null $subscription_period = null,
        protected Gift|null $gift = null,
        protected AffiliateInfo|null $affiliate = null,
        protected int|null $premium_subscription_duration = null,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::User);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): TransactionPartnerUser
    {
        $this->user = $user;
        return $this;
    }

    public function getTransactionType(): TransactionTypeEnum
    {
        return $this->transaction_type;
    }

    public function setTransactionType(TransactionTypeEnum $transaction_type): void
    {
        $this->transaction_type = $transaction_type;
    }

    public function getInvoicePayload(): string|null
    {
        return $this->invoice_payload;
    }

    public function setInvoicePayload(string|null $invoice_payload): TransactionPartnerUser
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    public function getPaidMedia(): array|null
    {
        return $this->paid_media;
    }

    public function setPaidMedia(array|null $paid_media): TransactionPartnerUser
    {
        $this->paid_media = $paid_media;
        return $this;
    }

    public function getPaidMediaPayload(): string|null
    {
        return $this->paid_media_payload;
    }

    public function setPaidMediaPayload(string|null $paid_media_payload): TransactionPartnerUser
    {
        $this->paid_media_payload = $paid_media_payload;
        return $this;
    }

    public function getSubscriptionPeriod(): ?int
    {
        return $this->subscription_period;
    }

    public function setSubscriptionPeriod(?int $subscription_period): void
    {
        $this->subscription_period = $subscription_period;
    }

    public function getGift(): ?Gift
    {
        return $this->gift;
    }

    public function setGift(?Gift $gift): void
    {
        $this->gift = $gift;
    }

    public function getAffiliate(): ?AffiliateInfo
    {
        return $this->affiliate;
    }

    public function setAffiliate(?AffiliateInfo $affiliate): void
    {
        $this->affiliate = $affiliate;
    }

    public function getPremiumSubscriptionDuration(): ?int
    {
        return $this->premium_subscription_duration;
    }

    public function setPremiumSubscriptionDuration(?int $premium_subscription_duration): void
    {
        $this->premium_subscription_duration = $premium_subscription_duration;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'user' => $this->user->toArray(),
            'invoice_payload' => $this->invoice_payload,
            'paid_media' => $this->paid_media !== null
                ? array_map(fn(AbstractPaidMedia $e) => $e->toArray(), $this->paid_media)
                : null,
            'paid_media_payload' => $this->paid_media_payload,
            'subscription_period' => $this->subscription_period,
            'gift' => $this->gift?->toArray(),
            'affiliate' => $this->affiliate?->toArray(),
            'premium_subscription_duration' => $this->premium_subscription_duration,
            'transaction_type' => $this->transaction_type->value,
        ];
    }
}
