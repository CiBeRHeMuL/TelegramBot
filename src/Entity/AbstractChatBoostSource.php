<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\ChatBoostSourceEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the source of a chat boost.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chatboostsource
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Gift code boost source] => ChatBoostSourceGiftCode
 * CLASS 5[Giveaway boost source] => ChatBoostSourceGiveaway
 * CLASS 5[Premium boost source] => ChatBoostSourcePremium
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractChatBoostSource, Telegram Bot API, abstract, chat, boost, source, DTO
// STRUCTURE: ▶ ┌source: ChatBoostSourceEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractChatBoostSource [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
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
