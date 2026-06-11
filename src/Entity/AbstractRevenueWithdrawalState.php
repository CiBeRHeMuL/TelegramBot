<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the state of a revenue withdrawal operation.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#revenuewithdrawalstate
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Pending withdrawal] => RevenueWithdrawalStatePending
 * CLASS 5[Succeeded withdrawal] => RevenueWithdrawalStateSucceeded
 * CLASS 5[Failed withdrawal] => RevenueWithdrawalStateFailed
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractRevenueWithdrawalState, Telegram Bot API, abstract, revenue, withdrawal, state, DTO
// STRUCTURE: ▶ ┌type: RevenueWithdrawalStateTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractRevenueWithdrawalState [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes the state of a revenue withdrawal operation.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstate
 */
#[AvailableInheritors([
    RevenueWithdrawalStatePending::class,
    RevenueWithdrawalStateSucceeded::class,
    RevenueWithdrawalStateFailed::class,
])]
abstract class AbstractRevenueWithdrawalState implements EntityInterface
{
    public function __construct(
        protected readonly RevenueWithdrawalStateTypeEnum $type,
    ) {}

    public function getType(): RevenueWithdrawalStateTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractRevenueWithdrawalState
