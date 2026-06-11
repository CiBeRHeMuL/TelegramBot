<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a pending revenue withdrawal state.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RevenueWithdrawalStatePending, Telegram, Bot API, DTO, revenuewithdrawalstatepending
// STRUCTURE: ▶ ┌type┐ → ∑ RevenueWithdrawalStatePending
// region CLASS_RevenueWithdrawalStatePending

/**
 * The withdrawal is in progress.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Pending->value))]
final class RevenueWithdrawalStatePending extends AbstractRevenueWithdrawalState
{
    public function __construct()
    {
        parent::__construct(RevenueWithdrawalStateTypeEnum::Pending);
    }
}

// endregion CLASS_RevenueWithdrawalStatePending
