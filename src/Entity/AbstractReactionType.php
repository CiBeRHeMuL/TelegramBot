<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the type of a reaction.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#reactiontype
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Emoji reaction type] => ReactionTypeEmoji
 * CLASS 5[Custom emoji reaction type] => ReactionTypeCustomEmoji
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractReactionType, Telegram Bot API, abstract, reaction, type, DTO
// STRUCTURE: ▶ ┌type: ReactionTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractReactionType [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes the type of a reaction.
 *
 * @see https://core.telegram.org/bots/api#reactiontype
 */
#[AvailableInheritors([
    ReactionTypeEmoji::class,
    ReactionTypeCustomEmoji::class,
])]
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
// endregion CLASS_AbstractReactionType
