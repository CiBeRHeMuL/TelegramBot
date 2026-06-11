<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about a paid media purchase.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#paidmediapurchased
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PaidMediaPurchased, Telegram, Bot API, DTO, paidmediapurchased
// STRUCTURE: ▶ ┌from,paid_media_payload┐ → ∑ purchase
// region CLASS_PaidMediaPurchased

/**
 * This object contains information about a paid media purchase.
 *
 * @see https://core.telegram.org/bots/api#paidmediapurchased
 */
final class PaidMediaPurchased implements EntityInterface
{
    /**
     * @param User   $from               User who purchased the media
     * @param string $paid_media_payload Bot-specified paid media payload
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $from,
        protected string $paid_media_payload,
    ) {}

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     *
     * @return PaidMediaPurchased
     */
    public function setFrom(User $from): PaidMediaPurchased
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaidMediaPayload(): string
    {
        return $this->paid_media_payload;
    }

    /**
     * @param string $paid_media_payload
     *
     * @return PaidMediaPurchased
     */
    public function setPaidMediaPayload(string $paid_media_payload): PaidMediaPurchased
    {
        $this->paid_media_payload = $paid_media_payload;

        return $this;
    }
}

// endregion CLASS_PaidMediaPurchased
