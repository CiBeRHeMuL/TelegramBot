<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a failed revenue withdrawal state.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RevenueWithdrawalStateFailed, Telegram, Bot API, DTO, revenuewithdrawalstatefailed
// STRUCTURE: ▶ ┌type┐ → ∑ RevenueWithdrawalStateFailed
// region CLASS_RevenueWithdrawalStateFailed

/**
 * The withdrawal failed and the transaction was refunded.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Failed->value))]
final class RevenueWithdrawalStateFailed extends AbstractRevenueWithdrawalState
{
    public function __construct()
    {
        parent::__construct(RevenueWithdrawalStateTypeEnum::Failed);
    }
}

// endregion CLASS_RevenueWithdrawalStateFailed
