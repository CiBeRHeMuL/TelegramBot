<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Contains the list of gifts received and owned by a user or a chat.
 *
 * @link https://core.telegram.org/bots/api#ownedgifts
 */
class OwnedGifts extends AbstractEntity
{
    /**
     * @param int $total_count The total number of gifts owned by the user or the chat
     * @param AbstractOwnedGift[] $gifts The list of gifts
     * @param string|null $next_offset Optional. Offset for the next request. If empty, then there are no more results
     *
     * @see https://core.telegram.org/bots/api#ownedgift OwnedGift
     */
    public function __construct(
        protected int $total_count,
        #[ArrayType(AbstractOwnedGift::class)]
        protected array $gifts,
        protected string|null $next_offset = null,
    ) {
        parent::__construct();
    }

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
    public function getNextOffset(): string|null
    {
        return $this->next_offset;
    }

    /**
     * @param string|null $next_offset
     *
     * @return OwnedGifts
     */
    public function setNextOffset(string|null $next_offset): OwnedGifts
    {
        $this->next_offset = $next_offset;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'total_count' => $this->total_count,
            'gifts' => array_map(fn(AbstractOwnedGift $e) => $e->toArray(), $this->gifts),
            'next_offset' => $this->next_offset,
        ];
    }
}
