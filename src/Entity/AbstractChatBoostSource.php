<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\ChatBoostSourceEnum;

// region CLASS_AbstractChatBoostSource
/**
 * This object describes the source of a chat boost.
 *
 * @see https://core.telegram.org/bots/api#chatboostsource
 */
#[AvailableInheritors([
    ChatBoostSourceGiftCode::class,
    ChatBoostSourceGiveaway::class,
    ChatBoostSourcePremium::class,
])]
abstract class AbstractChatBoostSource implements EntityInterface
{
    /**
     * @param ChatBoostSourceEnum $source Source of the boost
     */
    public function __construct(
        protected readonly ChatBoostSourceEnum $source,
    ) {}

    public function getSource(): ChatBoostSourceEnum
    {
        return $this->source;
    }
}
// endregion CLASS_AbstractChatBoostSource
