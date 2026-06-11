<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a list of gifts.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#gifts
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Gifts, gift, list, Telegram Bot API
// STRUCTURE: ┌gifts[]┐ → ∑ Gifts
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
