<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region CLASS_Gifts
/**
 * This object represent a list of gifts.
 *
 * @see https://core.telegram.org/bots/api#gifts
 */
final class Gifts implements EntityInterface
{
    /**
     * @param Gift[] $gifts The list of gifts
     *
     * @see https://core.telegram.org/bots/api#gift Gift
     */
    public function __construct(
        #[ArrayType(Gift::class)]
        protected array $gifts,
    ) {}

    /**
     * @return Gift[]
     */
    public function getGifts(): array
    {
        return $this->gifts;
    }
}
// endregion CLASS_Gifts
