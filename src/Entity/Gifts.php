<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represent a list of gifts.
 *
 * @link https://core.telegram.org/bots/api#gifts
 */
class Gifts extends AbstractEntity
{
    /**
     * @param Gift[] $gifts The list of gifts
     *
     * @see https://core.telegram.org/bots/api#gift Gift
     */
    public function __construct(
        #[ArrayType(Gift::class)]
        protected array $gifts,
    ) {
        parent::__construct();
    }

    /**
     * @return Gift[]
     */
    public function getGifts(): array
    {
        return $this->gifts;
    }

    /**
     * @param Gift[] $gifts
     *
     * @return Gifts
     */
    public function setGifts(array $gifts): Gifts
    {
        $this->gifts = $gifts;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'gifts' => array_map(
                fn(Gift $e) => $e->toArray(),
                $this->gifts,
            ),
        ];
    }
}
