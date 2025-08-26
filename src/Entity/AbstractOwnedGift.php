<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\OwnedGiftTypeEnum;

/**
 * This object describes a gift received and owned by a user or a chat.
 * @link https://core.telegram.org/bots/api#ownedgift
 */
#[AvailableInheritors([
    OwnedGiftRegular::class,
])]
abstract class AbstractOwnedGift implements EntityInterface
{
    public function __construct(
        protected readonly OwnedGiftTypeEnum $type,
    ) {
    }

    public function getType(): OwnedGiftTypeEnum
    {
        return $this->type;
    }
}
