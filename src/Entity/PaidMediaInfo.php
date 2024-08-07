<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Describes the paid media added to a message.
 * @link https://core.telegram.org/bots/api#paidmediainfo
 */
class PaidMediaInfo extends AbstractEntity
{
    /**
     * @param int $star_count The number of Telegram Stars that must be paid to buy access to the media
     * @param AbstractPaidMedia[] $paid_media Information about the paid media
     */
    public function __construct(
        protected int $star_count,
        #[ArrayType(AbstractPaidMedia::class)] protected array $paid_media,
    ) {
        parent::__construct();
    }

    public function getStarCount(): int
    {
        return $this->star_count;
    }

    public function setStarCount(int $star_count): PaidMediaInfo
    {
        $this->star_count = $star_count;
        return $this;
    }

    public function getPaidMedia(): array
    {
        return $this->paid_media;
    }

    public function setPaidMedia(array $paid_media): PaidMediaInfo
    {
        $this->paid_media = $paid_media;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'star_count' => $this->star_count,
            'paid_media' => array_map(fn(AbstractPaidMedia $e) => $e->toArray(), $this->paid_media),
        ];
    }
}
