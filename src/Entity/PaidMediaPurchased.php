<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object contains information about a paid media purchase.
 * @link https://core.telegram.org/bots/api#paidmediapurchased
 */
class PaidMediaPurchased extends AbstractEntity
{
    /**
     * @param User $from User who purchased the media
     * @param string $paid_media_payload Bot-specified paid media payload
     */
    public function __construct(
        protected User $from,
        protected string $paid_media_payload,
    ) {
        parent::__construct();
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function setFrom(User $from): PaidMediaPurchased
    {
        $this->from = $from;
        return $this;
    }

    public function getPaidMediaPayload(): string
    {
        return $this->paid_media_payload;
    }

    public function setPaidMediaPayload(string $paid_media_payload): PaidMediaPurchased
    {
        $this->paid_media_payload = $paid_media_payload;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'from' => $this->from->toArray(),
            'paid_media_payload' => $this->paid_media_payload,
        ];
    }
}
