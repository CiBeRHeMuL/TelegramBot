<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Contains information about the affiliate that received a commission via this transaction.
 *
 * @link https://core.telegram.org/bots/api#affiliateinfo
 */
final class AffiliateInfo implements EntityInterface
{
    /**
     * @param int $commission_per_mille The number of Telegram Stars received by the affiliate for each 1000 Telegram Stars received
     * by the bot from referred users
     * @param int $amount Integer amount of Telegram Stars received by the affiliate from the transaction, rounded to 0; can be negative
     * for refunds
     * @param Chat|null $affiliate_chat Optional. The chat that received an affiliate commission if it was received by a chat
     * @param User|null $affiliate_user Optional. The bot or the user that received an affiliate commission if it was received by
     * a bot or a user
     * @param int|null $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars received by the affiliate;
     * from -999999999 to 999999999; can be negative for refunds
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected int $commission_per_mille,
        protected int $amount,
        protected Chat|null $affiliate_chat = null,
        protected User|null $affiliate_user = null,
        protected int|null $nanostar_amount = null,
    ) {
    }

    /**
     * @return int
     */
    public function getCommissionPerMille(): int
    {
        return $this->commission_per_mille;
    }

    /**
     * @param int $commission_per_mille
     *
     * @return AffiliateInfo
     */
    public function setCommissionPerMille(int $commission_per_mille): AffiliateInfo
    {
        $this->commission_per_mille = $commission_per_mille;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return AffiliateInfo
     */
    public function setAmount(int $amount): AffiliateInfo
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getAffiliateChat(): Chat|null
    {
        return $this->affiliate_chat;
    }

    /**
     * @param Chat|null $affiliate_chat
     *
     * @return AffiliateInfo
     */
    public function setAffiliateChat(Chat|null $affiliate_chat): AffiliateInfo
    {
        $this->affiliate_chat = $affiliate_chat;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getAffiliateUser(): User|null
    {
        return $this->affiliate_user;
    }

    /**
     * @param User|null $affiliate_user
     *
     * @return AffiliateInfo
     */
    public function setAffiliateUser(User|null $affiliate_user): AffiliateInfo
    {
        $this->affiliate_user = $affiliate_user;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNanostarAmount(): int|null
    {
        return $this->nanostar_amount;
    }

    /**
     * @param int|null $nanostar_amount
     *
     * @return AffiliateInfo
     */
    public function setNanostarAmount(int|null $nanostar_amount): AffiliateInfo
    {
        $this->nanostar_amount = $nanostar_amount;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'commission_per_mille' => $this->commission_per_mille,
            'amount' => $this->amount,
            'affiliate_chat' => $this->affiliate_chat?->toArray(),
            'affiliate_user' => $this->affiliate_user?->toArray(),
            'nanostar_amount' => $this->nanostar_amount,
        ];
    }
}
