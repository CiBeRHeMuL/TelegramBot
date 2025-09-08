<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;

/**
 * This object describes the type of a reaction
 * @link https://core.telegram.org/bots/api#reactiontype
 */
#[AvailableInheritors([ReactionTypeEmoji::class, ReactionTypeCustomEmoji::class])]
abstract class AbstractReactionType implements EntityInterface
{
    public function __construct(
        protected readonly ReactionTypeEnum $type,
    ) {}

    public function getType(): ReactionTypeEnum
    {
        return $this->type;
    }
}
