<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;

/**
 * This object describes the origin of a message
 * @link https://core.telegram.org/bots/api#messageorigin
 */
#[AvailableInheritors([
    MessageOriginChannel::class,
    MessageOriginChat::class,
    MessageOriginHiddenUser::class,
    MessageOriginUser::class,
])]
abstract class AbstractMessageOrigin implements EntityInterface
{
    public function __construct(
        protected readonly MessageOriginTypeEnum $type,
    ) {
    }

    public function getType(): MessageOriginTypeEnum
    {
        return $this->type;
    }
}
