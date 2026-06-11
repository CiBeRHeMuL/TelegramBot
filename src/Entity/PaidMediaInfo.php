<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about paid media.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#paidmediainfo
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PaidMediaInfo, Telegram, Bot API, DTO, paidmediainfo
// STRUCTURE: ▶ ┌paid_media: PaidMedia[]┐ → ∑ PaidMediaInfo
// region CLASS_PaidMediaInfo

/**
 * Describes the paid media added to a message.
 *
 * @see https://core.telegram.org/bots/api#paidmediainfo
 */
final class PaidMediaInfo implements EntityInterface
{
    /**
     * @param int                 $star_count The number of Telegram Stars that must be paid to buy access to the media
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

// endregion CLASS_PaidMediaInfo
