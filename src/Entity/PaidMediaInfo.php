<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * Describes the paid media added to a message.
 *
 * @link https://core.telegram.org/bots/api#paidmediainfo
 */
final class PaidMediaInfo implements EntityInterface
{
    /**
     * @param int $star_count The number of Telegram Stars that must be paid to buy access to the media
     * @param AbstractPaidMedia[] $paid_media Information about the paid media
     *
     * @see https://core.telegram.org/bots/api#paidmedia PaidMedia
     */
    public function __construct(
        protected int $star_count,
        #[ArrayType(AbstractPaidMedia::class)]
        protected array $paid_media,
    ) {}

    /**
     * @return int
     */
    public function getStarCount(): int
    {
        return $this->star_count;
    }

    /**
     * @param int $star_count
     *
     * @return PaidMediaInfo
     */
    public function setStarCount(int $star_count): PaidMediaInfo
    {
        $this->star_count = $star_count;
        return $this;
    }

    /**
     * @return AbstractPaidMedia[]
     */
    public function getPaidMedia(): array
    {
        return $this->paid_media;
    }

    /**
     * @param AbstractPaidMedia[] $paid_media
     *
     * @return PaidMediaInfo
     */
    public function setPaidMedia(array $paid_media): PaidMediaInfo
    {
        $this->paid_media = $paid_media;
        return $this;
    }
}
