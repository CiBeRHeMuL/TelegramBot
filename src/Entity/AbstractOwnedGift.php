<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\OwnedGiftTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes a gift received and owned by a user or a chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#ownedgift
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Regular owned gift] => OwnedGiftRegular
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractOwnedGift, Telegram Bot API, abstract, owned, gift, DTO
// STRUCTURE: ▶ ┌type: OwnedGiftTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractOwnedGift [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes a gift received and owned by a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#ownedgift
 */
#[AvailableInheritors([
    OwnedGiftRegular::class,
])]
abstract class AbstractOwnedGift implements EntityInterface
{
    public function __construct(
        protected readonly OwnedGiftTypeEnum $type,
    ) {}

    public function getType(): OwnedGiftTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractOwnedGift
