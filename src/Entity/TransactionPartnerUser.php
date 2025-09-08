<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use AndrewGos\TelegramBot\Enum\TransactionTypeEnum;

/**
 * Describes a transaction with a user.
 *
 * @link https://core.telegram.org/bots/api#transactionpartneruser
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::User->value))]
final class TransactionPartnerUser extends AbstractTransactionPartner
{
    /**
     * @param User $user Information about the user
     * @param TransactionTypeEnum $transaction_type Type of the transaction, currently one of “invoice_payment” for payments
     * via invoices, “paid_media_payment” for payments for paid media, “gift_purchase” for gifts sent by the bot, “premium_purchase”
     * for Telegram Premium subscriptions gifted by the bot, “business_account_transfer” for direct transfers from managed business
     * accounts
     * @param string|null $invoice_payload Optional. Bot-specified invoice payload. Can be available only for “invoice_payment”
     * transactions.
     * @param AbstractPaidMedia[]|null $paid_media Optional. Information about the paid media bought by the user; for “paid_media_payment”
     * transactions only
     * @param string|null $paid_media_payload Optional. Bot-specified paid media payload. Can be available only for “paid_media_payment”
     * transactions.
     * @param int|null $subscription_period Optional. The duration of the paid subscription. Can be available only for “invoice_payment”
     * transactions.
     * @param Gift|null $gift Optional. The gift sent to the user by the bot; for “gift_purchase” transactions only
     * @param AffiliateInfo|null $affiliate Optional. Information about the affiliate that received a commission via this transaction.
     * Can be available only for “invoice_payment” and “paid_media_payment” transactions.
     * @param int|null $premium_subscription_duration Optional. Number of months the gifted Telegram Premium subscription will be
     * active for; for “premium_purchase” transactions only
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#affiliateinfo AffiliateInfo
     * @see https://core.telegram.org/bots/api#paidmedia PaidMedia
     * @see https://core.telegram.org/bots/api#gift Gift
     */
    public function __construct(
        protected User $user,
        protected TransactionTypeEnum $transaction_type,
        protected ?string $invoice_payload = null,
        #[ArrayType(AbstractPaidMedia::class)]
        protected ?array $paid_media = null,
        protected ?string $paid_media_payload = null,
        protected ?int $subscription_period = null,
        protected ?Gift $gift = null,
        protected ?AffiliateInfo $affiliate = null,
        protected ?int $premium_subscription_duration = null,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::User);
    }

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
     * @return TransactionPartnerUser
     */
    public function setUser(User $user): TransactionPartnerUser
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return TransactionTypeEnum
     */
    public function getTransactionType(): TransactionTypeEnum
    {
        return $this->transaction_type;
    }

    /**
     * @param TransactionTypeEnum $transaction_type
     *
     * @return TransactionPartnerUser
     */
    public function setTransactionType(TransactionTypeEnum $transaction_type): TransactionPartnerUser
    {
        $this->transaction_type = $transaction_type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoicePayload(): ?string
    {
        return $this->invoice_payload;
    }

    /**
     * @param string|null $invoice_payload
     *
     * @return TransactionPartnerUser
     */
    public function setInvoicePayload(?string $invoice_payload): TransactionPartnerUser
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    /**
     * @return AbstractPaidMedia[]|null
     */
    public function getPaidMedia(): ?array
    {
        return $this->paid_media;
    }

    /**
     * @param AbstractPaidMedia[]|null $paid_media
     *
     * @return TransactionPartnerUser
     */
    public function setPaidMedia(?array $paid_media): TransactionPartnerUser
    {
        $this->paid_media = $paid_media;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaidMediaPayload(): ?string
    {
        return $this->paid_media_payload;
    }

    /**
     * @param string|null $paid_media_payload
     *
     * @return TransactionPartnerUser
     */
    public function setPaidMediaPayload(?string $paid_media_payload): TransactionPartnerUser
    {
        $this->paid_media_payload = $paid_media_payload;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubscriptionPeriod(): ?int
    {
        return $this->subscription_period;
    }

    /**
     * @param int|null $subscription_period
     *
     * @return TransactionPartnerUser
     */
    public function setSubscriptionPeriod(?int $subscription_period): TransactionPartnerUser
    {
        $this->subscription_period = $subscription_period;
        return $this;
    }

    /**
     * @return Gift|null
     */
    public function getGift(): ?Gift
    {
        return $this->gift;
    }

    /**
     * @param Gift|null $gift
     *
     * @return TransactionPartnerUser
     */
    public function setGift(?Gift $gift): TransactionPartnerUser
    {
        $this->gift = $gift;
        return $this;
    }

    /**
     * @return AffiliateInfo|null
     */
    public function getAffiliate(): ?AffiliateInfo
    {
        return $this->affiliate;
    }

    /**
     * @param AffiliateInfo|null $affiliate
     *
     * @return TransactionPartnerUser
     */
    public function setAffiliate(?AffiliateInfo $affiliate): TransactionPartnerUser
    {
        $this->affiliate = $affiliate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPremiumSubscriptionDuration(): ?int
    {
        return $this->premium_subscription_duration;
    }

    /**
     * @param int|null $premium_subscription_duration
     *
     * @return TransactionPartnerUser
     */
    public function setPremiumSubscriptionDuration(?int $premium_subscription_duration): TransactionPartnerUser
    {
        $this->premium_subscription_duration = $premium_subscription_duration;
        return $this;
    }
}
