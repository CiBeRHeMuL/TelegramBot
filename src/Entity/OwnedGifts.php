<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains the list of gifts owned by a user.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#ownedgifts
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: OwnedGifts, Telegram, Bot API, DTO, ownedgifts
// STRUCTURE: ▶ ┌gifts: OwnedGift[]┐ → ◇ next_offset,total_count → ∑ OwnedGifts
// region CLASS_OwnedGifts

/**
 * Contains the list of gifts received and owned by a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#ownedgifts
 */
final class OwnedGifts implements EntityInterface
{
    /**
     * @param int                 $total_count The total number of gifts owned by the user or the chat
     * @param AbstractOwnedGift[] $gifts       The list of gifts
     * @param string|null         $next_offset Optional. Offset for the next request. If empty, then there are no more results
     *
     * @see https://core.telegram.org/bots/api#ownedgift OwnedGift
     */
    public function __construct(
        protected int $total_count,
        #[ArrayType(AbstractOwnedGift::class)]
        protected array $gifts,
        protected ?string $next_offset = null,
    ) {}

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     *
     * @return OwnedGifts
     */
    public function setTotalCount(int $total_count): OwnedGifts
    {
        $this->total_count = $total_count;

        return $this;
    }

    /**
     * @return AbstractOwnedGift[]
     */
    public function getGifts(): array
    {
        return $this->gifts;
    }

    /**
     * @param AbstractOwnedGift[] $gifts
     *
     * @return OwnedGifts
     */
    public function setGifts(array $gifts): OwnedGifts
    {
        $this->gifts = $gifts;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNextOffset(): ?string
    {
        return $this->next_offset;
    }

    /**
     * @param string|null $next_offset
     *
     * @return OwnedGifts
     */
    public function setNextOffset(?string $next_offset): OwnedGifts
    {
        $this->next_offset = $next_offset;

        return $this;
    }
}

// endregion CLASS_OwnedGifts
